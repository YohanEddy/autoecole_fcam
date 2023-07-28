<div class="form-group">
    <label for="validationCustom01">
        <strong>{{ $label }}  @if ($isRequire) <span class="required">*</span> @endif</strong>
    </label>
    <input type="{{ $type }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" id="validationCustom01"
        value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}">
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
