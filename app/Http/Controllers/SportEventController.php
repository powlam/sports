<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\SportEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SportEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sportEvents = SportEvent::paginate();
        return view('dashboard.sportEvents.index', compact('sportEvents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sportEvents.create');
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
            'sport_discipline_id' => 'required|exists:sport_disciplines,id',
            'default' => 'boolean',
            'name' => 'required|unique:sport_events|max:200',
            'description' => 'nullable|string',
            'logo' => 'image|max:10',
        ]);

        $sportEvent = SportEvent::create([
            'sport_discipline_id' => $request->input('sport_discipline_id'),
            'default' => $request->boolean('default', false),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('logo')) {
            $image_path = $request->file('logo')->store('tmp');

            Logo::updateOrCreate(
                ['logoable_id' => $sportEvent->id, 'logoable_type' => $sportEvent->getMorphClass()],
                ['image' => Logo::convertImageForDatabase(storage_path('app/').$image_path)]
            );

            Storage::delete($image_path);
            $sportEvent->refresh();
        }

        return redirect()->route('dashboard.sportEvents.index')->with('success', __('terms.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SportEvent  $sportEvent
     * @return \Illuminate\Http\Response
     */
    public function show(SportEvent $sportEvent)
    {
        return view('dashboard.sportEvents.show', compact('sportEvent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SportEvent  $sportEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(SportEvent $sportEvent)
    {
        return view('dashboard.sportEvents.edit', compact('sportEvent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SportEvent  $sportEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SportEvent $sportEvent)
    {
        $this->validate($request, [
            'sport_discipline_id' => 'required|exists:sport_disciplines,id',
            'default' => 'boolean',
            'name' => [
                'required',
                Rule::unique('sport_events')->ignore($sportEvent->id),
                'max:200',
            ],
            'description' => 'nullable|string',
            'logo' => 'image|max:10',
        ]);

        $sportEvent->update([
            'sport_discipline_id' => $request->input('sport_discipline_id'),
            'default' => $request->boolean('default', false),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('logo')) {
            $image_path = $request->file('logo')->store('tmp');

            Logo::updateOrCreate(
                ['logoable_id' => $sportEvent->id, 'logoable_type' => $sportEvent->getMorphClass()],
                ['image' => Logo::convertImageForDatabase(storage_path('app/').$image_path)]
            );

            Storage::delete($image_path);
            $sportEvent->refresh();
        }

        return redirect()->route('dashboard.sportEvents.index')->with('success', __('terms.updated'));
    }

    /**
     * Show the form to confirm the destruction.
     *
     * @param  \App\Models\SportEvent  $sportEvent
     * @return \Illuminate\Http\Response
     */
    public function confirm(SportEvent $sportEvent)
    {
        return view('dashboard.sportEvents.confirm', compact('sportEvent'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SportEvent  $sportEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(SportEvent $sportEvent)
    {
        SportEvent::destroy($sportEvent->id);
        return redirect()->route('dashboard.sportEvents.index')->with('success', __('terms.destroyed'));
    }
}
