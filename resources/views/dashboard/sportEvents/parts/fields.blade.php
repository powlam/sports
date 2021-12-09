<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <x-label for="sportEventInputName" :value="__('sportEvent.name')" />
    </div>
    <div class="md:w-2/3">
        <x-input id="sportEventInputName" class="w-full" type="text" name='name' :value="old('name') ?? $sportEvent->name ?? null" :error="$errors->has('name')" required autofocus />
    </div>
</div>
