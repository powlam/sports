<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="sportInputName" :value="__('sport.name')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="sportInputName" class="w-full" type="text" name='name' :value="old('name') ?? $sport->name ?? null" :error="$errors->has('name')" required autofocus />
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="sportLogo" :value="__('sport.logo')" />
    </div>
    <div class="md:w-2/3">
        <x-dashboard.changable-image id="sportLogo" name='logo' src="{{ ($sport ?? false) && $sport->logo ? $sport->logo->image : '' }}" :error="$errors->has('logo')" />
    </div>
</div>
