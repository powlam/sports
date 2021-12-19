<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="tournamentChampionshipEdition" :value="__('tournament.championship_edition')" />
    </div>
    <div class="md:w-2/3">
        @php
            $allChampionshipEditions = [];
            foreach (App\Models\ChampionshipEdition::all() as $championshipEdition) {
                $allChampionshipEditions[$championshipEdition->id] = $championshipEdition->full_name;
            }
            $allChampionshipEditions = Illuminate\Support\Arr::sort($allChampionshipEditions);
        @endphp
        <x-select id="tournamentChampionshipEdition" class="w-full" name='championship_edition_id' :value="old('championship_edition_id') ?? $tournament->championship_edition_id ?? request()->query('championship_edition_id') ?? null" :error="$errors->has('championship_edition_id')" :options="$allChampionshipEditions" required />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="tournamentSportEvent" :value="__('tournament.sport_event')" />
    </div>
    <div class="md:w-2/3">
        @php
            $allSportEvents = [];
            foreach (App\Models\SportEvent::all() as $sportEvent) {
                $allSportEvents[$sportEvent->id] = $sportEvent->full_name;
            }
            $allSportEvents = Illuminate\Support\Arr::sort($allSportEvents);
        @endphp
        <x-select id="tournamentSportEvent" class="w-full" name='sport_event_id' :value="old('sport_event_id') ?? $tournament->sport_event_id ?? request()->query('sport_event_id') ?? null" :error="$errors->has('sport_event_id')" :options="$allSportEvents" required />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="tournamentGenre" :value="__('tournament.genre')" />
    </div>
    <div class="md:w-2/3">
        <x-select id="tournamentGenre" class="w-full" name='genre' :value="old('genre') ?? $tournament->genre ?? null" :error="$errors->has('genre')" :options="App\Models\Tournament::$genres"/>
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="tournamentType" :value="__('tournament.type')" />
    </div>
    <div class="md:w-2/3">
        <x-select id="tournamentType" class="w-full" name='type' :value="old('type') ?? $tournament->type ?? null" :error="$errors->has('type')" :options="App\Models\Tournament::$types"/>
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="tournamentState" :value="__('tournament.state')" />
    </div>
    <div class="md:w-2/3">
        <x-select id="tournamentState" class="w-full" name='state' :value="old('state') ?? $tournament->state ?? null" :error="$errors->has('state')" :options="App\Models\Tournament::$states"/>
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="tournamentLogo" :value="__('tournament.logo')" />
    </div>
    <div class="md:w-2/3">
        <x-dashboard.changable-image id="tournamentLogo" name='logo' src="{{ ($tournament ?? false) && $tournament->logo ? $tournament->logo->image : '' }}" :error="$errors->has('logo')" />
    </div>
</div>
