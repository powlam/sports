<?php

namespace App\Http\Controllers;

use App\Models\Championship;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ChampionshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $championships = Championship::paginate();
        return view('dashboard.championships.index', compact('championships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.championships.create');
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
            'name' => 'required|unique:championships|max:191',
            'scope' => [
                'nullable',
                Rule::in(array_keys(Championship::$scopes)),
            ],
            'location' => 'nullable|string|max:191',
            'notes' => 'nullable|string|max:500',
            'logo' => 'image|max:10',
        ]);

        $championship = Championship::create([
            'name' => $request->input('name'),
            'scope' => $request->input('scope'),
            'location' => $request->input('location'),
            'notes' => $request->input('notes'),
        ]);

        if ($request->hasFile('logo')) {
            $image_path = $request->file('logo')->store('tmp');

            Logo::updateOrCreate(
                ['logoable_id' => $championship->id, 'logoable_type' => $championship->getMorphClass()],
                ['image' => Logo::convertImageForDatabase(storage_path('app/').$image_path)]
            );

            Storage::delete($image_path);
            $championship->refresh();
        }

        return redirect()->route('dashboard.championships.index')->with('success', __('terms.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function show(Championship $championship)
    {
        return view('dashboard.championships.show', compact('championship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function edit(Championship $championship)
    {
        return view('dashboard.championships.edit', compact('championship'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Championship $championship)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('championships')->ignore($championship->id),
                'max:191',
            ],
            'scope' => [
                'nullable',
                Rule::in(array_keys(Championship::$scopes)),
            ],
            'location' => 'nullable|string|max:191',
            'notes' => 'nullable|string|max:500',
            'logo' => 'image|max:10',
        ]);

        $championship->update([
            'name' => $request->input('name'),
            'scope' => $request->input('scope'),
            'location' => $request->input('location'),
            'notes' => $request->input('notes'),
        ]);

        if ($request->hasFile('logo')) {
            $image_path = $request->file('logo')->store('tmp');

            Logo::updateOrCreate(
                ['logoable_id' => $championship->id, 'logoable_type' => $championship->getMorphClass()],
                ['image' => Logo::convertImageForDatabase(storage_path('app/').$image_path)]
            );

            Storage::delete($image_path);
            $championship->refresh();
        }

        return redirect()->route('dashboard.championships.index')->with('success', __('terms.updated'));
    }

    /**
     * Show the form to confirm the destruction.
     *
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function confirm(Championship $championship)
    {
        return view('dashboard.championships.confirm', compact('championship'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Championship $championship)
    {
        Championship::destroy($championship->id);
        return redirect()->route('dashboard.championships.index')->with('success', __('terms.destroyed'));
    }
}
