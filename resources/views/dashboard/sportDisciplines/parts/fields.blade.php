<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="sportDisciplineSport" :value="__('sportDiscipline.sport')" />
    </div>
    <div class="md:w-2/3">
        @php
            $allSports = [];
            foreach (App\Models\Sport::all() as $sport) {
                $allSports[$sport->id] = $sport->name;
            }
            $allSports = Illuminate\Support\Arr::sort($allSports);
        @endphp
        <x-select id="sportDisciplineSport" class="w-full" name='sport_id' :value="old('sport_id') ?? $sportDiscipline->sport_id ?? null" :error="$errors->has('sport_id')" :options="$allSports" required />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="sportDisciplineDefault" :value="__('sportDiscipline.default')" />
    </div>
    <div class="md:w-2/3">
        <x-checkbox id="sportDisciplineDefault" name="default" :value="true" :checked="old('default') ?? $sportDiscipline->default ?? false" :error="$errors->has('default')" />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="sportDisciplineInputName" :value="__('sportDiscipline.name')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="sportDisciplineInputName" class="w-full" type="text" name='name' :value="old('name') ?? $sportDiscipline->name ?? null" :error="$errors->has('name')" required autofocus />
    </div>
</div>
