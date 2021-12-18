<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipInputName" :value="__('championship.name')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="championshipInputName" class="w-full" type="text" name='name' :value="old('name') ?? $championship->name ?? null" :error="$errors->has('name')" required autofocus />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipScope" :value="__('championship.scope')" />
    </div>
    <div class="md:w-2/3">
        <x-select id="championshipScope" class="w-full" name='scope' :value="old('scope') ?? $championship->scope ?? null" :error="$errors->has('scope')" :options="App\Models\Championship::$scopes" />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipLocation" :value="__('championship.location')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="championshipLocation" class="w-full" type="text" name='location' :value="old('location') ?? $championship->location ?? null" :error="$errors->has('location')" />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipNotes" :value="__('championship.notes')" />
    </div>
    <div class="md:w-2/3">
        <x-textarea rows="5" id="championshipNotes" class="w-full" name='notes' maxlength='500' :value="old('notes') ?? $championship->notes ?? null" :error="$errors->has('notes')" />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="championshipLogo" :value="__('championship.logo')" />
    </div>
    <div class="md:w-2/3">
        <x-dashboard.changable-image id="championshipLogo" name='logo' src="{{ ($championship ?? false) && $championship->logo ? $championship->logo->image : '' }}" :error="$errors->has('logo')" />
    </div>
</div>
