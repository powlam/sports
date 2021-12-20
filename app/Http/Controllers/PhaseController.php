<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PhaseController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.phases.create');
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
            'tournament_id' => 'required|exists:tournaments,id',
            'name' => 'required|string|max:191',
            'order' => [
                'required',
                'numeric',
                'min:1',
                Rule::unique('phases', 'order')->where(function ($query) use ($request) {
                    return $query->where('tournament_id', $request->input('tournament_id'));
                }),
            ],
            'type' => [
                'nullable',
                Rule::in(array_keys(Phase::$types)),
            ],
        ]);

        $phase = Phase::create([
            'tournament_id' => $request->input('tournament_id'),
            'name' => $request->input('name'),
            'order' => $request->input('order'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('dashboard.tournaments.show', $phase->tournament->id)->with('success', __('terms.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function show(Phase $phase)
    {
        return view('dashboard.phases.show', compact('phase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function edit(Phase $phase)
    {
        return view('dashboard.phases.edit', compact('phase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phase $phase)
    {
        $this->validate($request, [
            'tournament_id' => 'required|exists:tournaments,id',
            'name' => 'required|string|max:191',
            'order' => [
                'required',
                'numeric',
                'min:1',
                Rule::unique('phases', 'order')->where(function ($query) use ($request) {
                    return $query->where('tournament_id', $request->input('tournament_id'));
                }),
            ],
            'type' => [
                'nullable',
                Rule::in(array_keys(Phase::$types)),
            ],
        ]);

        $phase->update([
            'tournament_id' => $request->input('tournament_id'),
            'name' => $request->input('name'),
            'order' => $request->input('order'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('dashboard.tournaments.show', $phase->tournament->id)->with('success', __('terms.updated'));
    }

    /**
     * Show the form to confirm the destruction.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function confirm(Phase $phase)
    {
        return view('dashboard.phases.confirm', compact('phase'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phase $phase)
    {
        $tournament_id = $phase->tournament->id;
        Phase::destroy($phase->id);
        return redirect()->route('dashboard.tournaments.show', $tournament_id)->with('success', __('terms.destroyed'));
    }
}
