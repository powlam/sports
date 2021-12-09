<?php

namespace App\Http\Controllers;

use App\Models\SportDiscipline;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SportDisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sportDisciplines = SportDiscipline::all();
        return view('dashboard.sportDisciplines.index', compact('sportDisciplines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sportDisciplines.create');
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
            'name' => 'required|unique:sport_disciplines|max:100',
        ]);

        SportDiscipline::create(['name' => $request->input('name')]);
        return redirect()->route('dashboard.sportDisciplines.index')->with('success', __('terms.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SportDiscipline  $sportDiscipline
     * @return \Illuminate\Http\Response
     */
    public function show(SportDiscipline $sportDiscipline)
    {
        return view('dashboard.sportDisciplines.show', compact('sportDiscipline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SportDiscipline  $sportDiscipline
     * @return \Illuminate\Http\Response
     */
    public function edit(SportDiscipline $sportDiscipline)
    {
        return view('dashboard.sportDisciplines.edit', compact('sportDiscipline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SportDiscipline  $sportDiscipline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SportDiscipline $sportDiscipline)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('sport_disciplines')->ignore($sportDiscipline->id),
                'max:100',
            ],
        ]);

        $sportDiscipline->update(['name' => $request->input('name')]);
        return redirect()->route('dashboard.sportDisciplines.index')->with('success', __('terms.updated'));
    }

    /**
     * Show the form to confirm the destruction.
     *
     * @param  \App\Models\SportDiscipline  $sportDiscipline
     * @return \Illuminate\Http\Response
     */
    public function confirm(SportDiscipline $sportDiscipline)
    {
        return view('dashboard.sportDisciplines.confirm', compact('sportDiscipline'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SportDiscipline  $sportDiscipline
     * @return \Illuminate\Http\Response
     */
    public function destroy(SportDiscipline $sportDiscipline)
    {
        SportDiscipline::destroy($sportDiscipline->id);
        return redirect()->route('dashboard.sportDisciplines.index')->with('success', __('terms.destroyed'));
    }
}
