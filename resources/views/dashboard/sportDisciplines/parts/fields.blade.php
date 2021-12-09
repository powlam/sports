<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="sportDisciplineInputName" :value="__('sportDiscipline.name')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="sportDisciplineInputName" class="w-full" type="text" name='name' :value="old('name') ?? $sportDiscipline->name ?? null" :error="$errors->has('name')" required autofocus />
    </div>
</div>
