<div class="mb-3">
    <label for="sportInputName" class="form-label">@lang('sport.name')</label>
    <input type="text" id="sportInputName" name='name' class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $sport->name ?? null }}">
</div>
