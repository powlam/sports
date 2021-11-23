<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <label for="sportInputName" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
            @lang('sport.name')
        </label>
    </div>
    <div class="md:w-2/3">
        <input type="text" id="sportInputName" name='name' value="{{ old('name') ?? $sport->name ?? null }}" class="bg-gray-200 appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-yellow-400 @error('name') is-invalid border-red-500 @else border-gray-300 @enderror">
    </div>
</div>
