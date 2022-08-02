<div class="form-group form-floating">
    <input class="form-control @if($errors->any()) @error($name) is-invalid @else is-valid @enderror @endif"
        type="text" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" 
        value="{{ $value }}" @if($required) required @endif>

    <label>{{ $title }} @if($required) <span class="text-danger">*</span> @endif</label>
    
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>