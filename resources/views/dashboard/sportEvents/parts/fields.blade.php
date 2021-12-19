<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="sportEventSportDiscipline" :value="__('sportEvent.sport_discipline')" />
    </div>
    <div class="md:w-2/3">
        @php
            $allSportDisciplines = [];
            foreach (App\Models\SportDiscipline::all() as $sportDiscipline) {
                $allSportDisciplines[$sportDiscipline->id] = $sportDiscipline->full_name;
            }
            $allSportDisciplines = Illuminate\Support\Arr::sort($allSportDisciplines);
        @endphp
        <x-select id="sportEventSportDiscipline" class="w-full" name='sport_discipline_id' :value="old('sport_discipline_id') ?? $sportEvent->sport_discipline_id ?? request()->query('sport_discipline_id') ?? null" :error="$errors->has('sport_discipline_id')" :options="$allSportDisciplines" required />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="sportEventDefault" :value="__('sportEvent.default')" />
    </div>
    <div class="md:w-2/3">
        <x-checkbox id="sportEventDefault" name="default" :value="true" :checked="old('default') ?? $sportEvent->default ?? false" :error="$errors->has('default')" />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="sportEventInputName" :value="__('sportEvent.name')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="sportEventInputName" class="w-full" type="text" name='name' :value="old('name') ?? $sportEvent->name ?? null" :error="$errors->has('name')" required autofocus />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="sportEventDescription" :value="__('sportEvent.description')" />
    </div>
    <div class="md:w-2/3">
        <x-textarea rows="5" id="sportEventDescription" class="w-full" name='description' :value="old('description') ?? $sportEvent->description ?? null" :error="$errors->has('description')" />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="sportEventLogo" :value="__('sportEvent.logo')" />
    </div>
    <div class="md:w-2/3">
        <x-dashboard.changable-image id="sportEventLogo" name='logo' src="{{ ($sportEvent ?? false) && $sportEvent->logo ? $sportEvent->logo->image : '' }}" :error="$errors->has('logo')" />
    </div>
</div>
