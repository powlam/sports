<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipEditionChampionship" :value="__('championshipEdition.championship')" />
    </div>
    <div class="md:w-2/3">
        @php
            $allChampionships = [];
            foreach (App\Models\Championship::all() as $championship) {
                $allChampionships[$championship->id] = $championship->name;
            }
            $allChampionships = Illuminate\Support\Arr::sort($allChampionships);
        @endphp
        
        <x-select id="championshipEditionChampionship" class="w-full" name='championship_id' :value="old('championship_id') ?? $championshipEdition->championship_id ?? request()->query('championship_id') ?? null" :error="$errors->has('championship_id')" :options="$allChampionships" required />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipEditionInputName" :value="__('championshipEdition.name')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="championshipEditionInputName" class="w-full" type="text" name='name' :value="old('name') ?? $championshipEdition->name ?? null" :error="$errors->has('name')" required autofocus />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipEditionEdition" :value="__('championshipEdition.edition')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="championshipEditionEdition" class="w-full" type="number" min="1" name='edition' :value="old('edition') ?? $championshipEdition->edition ?? 1" :error="$errors->has('edition')" />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipEditionStart" :value="__('championshipEdition.start')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="championshipEditionStart" class="w-full" type="date" name='start' :value="old('start') ?? $championshipEdition->start->format('Y-m-d') ?? null" :error="$errors->has('start')" />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipEditionEnd" :value="__('championshipEdition.end')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="championshipEditionEnd" class="w-full" type="date" name='end' :value="old('end') ?? $championshipEdition->end->format('Y-m-d') ?? null" :error="$errors->has('end')" />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipEditionState" :value="__('championshipEdition.state')" />
    </div>
    <div class="md:w-2/3">
        <x-select id="championshipEditionState" class="w-full" name='state' :value="old('state') ?? $championshipEdition->state ?? null" :error="$errors->has('state')" :options="App\Models\ChampionshipEdition::$states"/>
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipEditionLocation" :value="__('championshipEdition.location')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="championshipEditionLocation" class="w-full" type="text" name='location' :value="old('location') ?? $championshipEdition->location ?? null" :error="$errors->has('location')" />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipEditionNotes" :value="__('championshipEdition.notes')" />
    </div>
    <div class="md:w-2/3">
        <x-textarea rows="5" id="championshipEditionNotes" class="w-full" name='notes' maxlength='500' :value="old('notes') ?? $championshipEdition->notes ?? null" :error="$errors->has('notes')" />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipEditionLogo" :value="__('championshipEdition.logo')" />
    </div>
    <div class="md:w-2/3">
        <x-dashboard.changable-image id="championshipEditionLogo" name='logo' src="{{ ($championshipEdition ?? false) && $championshipEdition->logo ? $championshipEdition->logo->image : '' }}" :error="$errors->has('logo')" />
    </div>
</div>
