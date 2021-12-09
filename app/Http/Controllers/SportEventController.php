<?php

namespace App\Http\Controllers;

use App\Models\SportEvent;
use Illuminate\Http\Request;
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
        $sportEvents = SportEvent::all();
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
            'name' => 'required|unique:sport_events|max:100',
        ]);

        SportEvent::create(['name' => $request->input('name')]);
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
            'name' => [
                'required',
                Rule::unique('sport_events')->ignore($sportEvent->id),
                'max:100',
            ],
        ]);

        $sportEvent->update(['name' => $request->input('name')]);
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
