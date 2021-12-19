<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports = Sport::paginate();
        return view('dashboard.sports.index', compact('sports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sports|max:100',
            'logo' => 'image|max:10',
        ]);

        $sport = Sport::create(['name' => $request->input('name')]);

        if ($request->hasFile('logo')) {
            $image_path = $request->file('logo')->store('tmp');

            Logo::updateOrCreate(
                ['logoable_id' => $sport->id, 'logoable_type' => $sport->getMorphClass()],
                ['image' => Logo::convertImageForDatabase(storage_path('app/').$image_path)]
            );

            Storage::delete($image_path);
            $sport->refresh();
        }

        return redirect()->route('dashboard.sports.index')->with('success', __('terms.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function show(Sport $sport)
    {
        return view('dashboard.sports.show', compact('sport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function edit(Sport $sport)
    {
        return view('dashboard.sports.edit', compact('sport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sport $sport)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('sports')->ignore($sport->id),
                'max:100',
            ],
            'logo' => 'image|max:10',
        ]);

        $sport->update(['name' => $request->input('name')]);

        if ($request->hasFile('logo')) {
            $image_path = $request->file('logo')->store('tmp');

            Logo::updateOrCreate(
                ['logoable_id' => $sport->id, 'logoable_type' => $sport->getMorphClass()],
                ['image' => Logo::convertImageForDatabase(storage_path('app/').$image_path)]
            );

            Storage::delete($image_path);
            $sport->refresh();
        }

        return redirect()->route('dashboard.sports.index')->with('success', __('terms.updated'));
    }

    /**
     * Show the form to confirm the destruction.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function confirm(Sport $sport)
    {
        return view('dashboard.sports.confirm', compact('sport'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        Sport::destroy($sport->id);
        return redirect()->route('dashboard.sports.index')->with('success', __('terms.destroyed'));
    }
}
