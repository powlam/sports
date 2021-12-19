<?php

namespace App\Http\Controllers;

use App\Models\ChampionshipEdition;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ChampionshipEditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $championshipEditions = ChampionshipEdition::paginate();
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
        $this->validate($request, [
            'championship_id' => 'required|exists:championships,id',
            'name' => 'required|string|max:191',
            'edition' => 'nullable|integer',
            'start' => 'nullable|date',
            'end' => 'nullable|date',
            'state' => [
                'nullable',
                Rule::in(array_keys(ChampionshipEdition::$states)),
            ],
            'location' => 'nullable|string|max:191',
            'notes' => 'nullable|string|max:500',
            'logo' => 'image|max:10',
        ]);

        $championshipEdition = ChampionshipEdition::create([
            'championship_id' => $request->input('championship_id'),
            'name' => $request->input('name'),
            'edition' => $request->input('edition', 1),
            'start' => $request->date('start'),
            'end' => $request->date('end'),
            'state' => $request->input('state'),
            'location' => $request->input('location'),
            'notes' => $request->input('notes'),
        ]);

        if ($request->hasFile('logo')) {
            $image_path = $request->file('logo')->store('tmp');

            Logo::updateOrCreate(
                ['logoable_id' => $championshipEdition->id, 'logoable_type' => $championshipEdition->getMorphClass()],
                ['image' => Logo::convertImageForDatabase(storage_path('app/').$image_path)]
            );

            Storage::delete($image_path);
            $championshipEdition->refresh();
        }

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
        $this->validate($request, [
            'championship_id' => 'required|exists:championships,id',
            'name' => 'required|string|max:191',
            'edition' => 'nullable|integer',
            'start' => 'nullable|date',
            'end' => 'nullable|date',
            'state' => [
                'nullable',
                Rule::in(array_keys(ChampionshipEdition::$states)),
            ],
            'location' => 'nullable|string|max:191',
            'notes' => 'nullable|string|max:500',
            'logo' => 'image|max:10',
        ]);

        $championshipEdition->update([
            'championship_id' => $request->input('championship_id'),
            'name' => $request->input('name'),
            'edition' => $request->input('edition', 1),
            'start' => $request->date('start'),
            'end' => $request->date('end'),
            'state' => $request->input('state'),
            'location' => $request->input('location'),
            'notes' => $request->input('notes'),
        ]);

        if ($request->hasFile('logo')) {
            $image_path = $request->file('logo')->store('tmp');

            Logo::updateOrCreate(
                ['logoable_id' => $championshipEdition->id, 'logoable_type' => $championshipEdition->getMorphClass()],
                ['image' => Logo::convertImageForDatabase(storage_path('app/').$image_path)]
            );

            Storage::delete($image_path);
            $championshipEdition->refresh();
        }

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
