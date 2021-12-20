<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="phaseTournament" :value="__('phase.tournament')" />
    </div>
    <div class="md:w-2/3">
        @php
            $allTournaments = [];
            foreach (App\Models\Tournament::all() as $tournament) {
                $allTournaments[$tournament->id] = $tournament->name;
            }
            $allTournaments = Illuminate\Support\Arr::sort($allTournaments);
        @endphp
        <x-select id="phaseTournament" class="w-full" name='tournament_id' :value="old('tournament_id') ?? $phase->tournament_id ?? request()->query('tournament_id') ?? null" :error="$errors->has('tournament_id')" :options="$allTournaments" required />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="phaseName" :value="__('phase.name')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="phaseName" class="w-full" type="text" name='name' :value="old('name') ?? $phase->name ?? null" :error="$errors->has('name')" required autofocus />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="phaseOrder" :value="__('phase.order')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="phaseOrder" class="w-full" type="number" min="1" name='order' :value="old('order') ?? $phase->order ?? 1" :error="$errors->has('order')" required />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="phaseType" :value="__('phase.type')" />
    </div>
    <div class="md:w-2/3">
        <x-select id="phaseType" class="w-full" name='type' :value="old('type') ?? $phase->type ?? null" :error="$errors->has('type')" :options="App\Models\Phase::$types"/>
    </div>
</div>

