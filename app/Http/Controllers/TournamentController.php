<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = Tournament::paginate();
        return view('dashboard.tournaments.index', compact('tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tournaments.create');
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
            'championship_edition_id' => 'required|exists:championship_editions,id',
            'sport_event_id' => 'required|exists:sport_events,id',
            'genre' => [
                'nullable',
                Rule::in(array_keys(Tournament::$genres)),
            ],
            'type' => [
                'nullable',
                Rule::in(array_keys(Tournament::$types)),
            ],
            'state' => [
                'nullable',
                Rule::in(array_keys(Tournament::$states)),
            ],
            'logo' => 'image|max:10',
        ]);

        $tournament = Tournament::create([
            'championship_edition_id' => $request->input('championship_edition_id'),
            'sport_event_id' => $request->input('sport_event_id'),
            'genre' => $request->input('genre'),
            'type' => $request->input('type'),
            'state' => $request->input('state'),
        ]);

        if ($request->hasFile('logo')) {
            $image_path = $request->file('logo')->store('tmp');

            Logo::updateOrCreate(
                ['logoable_id' => $tournament->id, 'logoable_type' => $tournament->getMorphClass()],
                ['image' => Logo::convertImageForDatabase(storage_path('app/').$image_path)]
            );

            Storage::delete($image_path);
            $tournament->refresh();
        }

        return redirect()->route('dashboard.tournaments.index')->with('success', __('terms.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        return view('dashboard.tournaments.show', compact('tournament'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        return view('dashboard.tournaments.edit', compact('tournament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        $this->validate($request, [
            'championship_edition_id' => $request->input('championship_edition_id'),
            'sport_event_id' => $request->input('sport_event_id'),
            'genre' => $request->input('genre'),
            'type' => $request->input('type'),
            'state' => $request->input('state'),
            'logo' => 'image|max:10',
        ]);

        $tournament->update([
            'championship_edition_id' => $request->input('championship_edition_id'),
            'sport_event_id' => $request->input('sport_event_id'),
            'genre' => $request->input('genre'),
            'type' => $request->input('type'),
            'state' => $request->input('state'),
        ]);

        if ($request->hasFile('logo')) {
            $image_path = $request->file('logo')->store('tmp');

            Logo::updateOrCreate(
                ['logoable_id' => $tournament->id, 'logoable_type' => $tournament->getMorphClass()],
                ['image' => Logo::convertImageForDatabase(storage_path('app/').$image_path)]
            );

            Storage::delete($image_path);
            $tournament->refresh();
        }

        return redirect()->route('dashboard.tournaments.index')->with('success', __('terms.updated'));
    }

    /**
     * Show the form to confirm the destruction.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function confirm(Tournament $tournament)
    {
        return view('dashboard.tournaments.confirm', compact('tournament'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        Tournament::destroy($tournament->id);
        return redirect()->route('dashboard.tournaments.index')->with('success', __('terms.destroyed'));
    }
}
