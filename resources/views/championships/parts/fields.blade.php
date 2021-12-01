<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipInputName" :value="__('championship.name')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="championshipInputName" class="w-full" type="text" name='name' :value="old('name') ?? $championship->name ?? null" :error="$errors->has('name')" required autofocus />
    </div>
    {{-- TODO more fields --}}
</div>
