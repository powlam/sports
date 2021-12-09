<?php

namespace App\Http\Controllers;

use App\Models\ChampionshipEdition;
use Illuminate\Http\Request;

class ChampionshipEditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $championshipEditions = ChampionshipEdition::all();
        return view('dashboard.championshipEditions.index', compact('championshipEditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.championshipEditions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|unique:championship_editions|max:100',
        // ]);

        ChampionshipEdition::create(['name' => $request->input('name')]);
        return redirect()->route('dashboard.championshipEditions.index')->with('success', __('terms.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChampionshipEdition  $championshipEdition
     * @return \Illuminate\Http\Response
     */
    public function show(ChampionshipEdition $championshipEdition)
    {
        return view('dashboard.championshipEditions.show', compact('championshipEdition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChampionshipEdition  $championshipEdition
     * @return \Illuminate\Http\Response
     */
    public function edit(ChampionshipEdition $championshipEdition)
    {
        return view('dashboard.championshipEditions.edit', compact('championshipEdition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChampionshipEdition  $championshipEdition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChampionshipEdition $championshipEdition)
    {
        // $this->validate($request, [
        //     'name' => [
        //         'required',
        //         Rule::unique('championship_editions')->ignore($championship->id),
        //         'max:100',
        //     ],
        // ]);

        $championshipEdition->update(['name' => $request->input('name')]);
        return redirect()->route('dashboard.championshipEditions.index')->with('success', __('terms.updated'));
    }

    /**
     * Show the form to confirm the destruction.
     *
     * @param  \App\Models\ChampionshipEdition  $championshipEdition
     * @return \Illuminate\Http\Response
     */
    public function confirm(ChampionshipEdition $championshipEdition)
    {
        return view('dashboard.championshipEditions.confirm', compact('championshipEdition'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChampionshipEdition  $championshipEdition
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChampionshipEdition $championshipEdition)
    {
        ChampionshipEdition::destroy($championshipEdition->id);
        return redirect()->route('dashboard.championshipEditions.index')->with('success', __('terms.destroyed'));
    }
}
