<div class="mb-3">
    <label for="{{$name}}" class="form-label">
        {{-- @php
            $name = Str::ucfirst("$name")
        @endphp --}}
        {{$name}}
    </label>
    <input type="{{$type}}" class="form-control @if ($errors->has($name)) is-invalid @endif" id="{{$name}}"
        name="{{$name}}" value="{{ $value ?? old($name) }}" {{$required ?? ""}}>

    @error($name)
        <div id="{{$name}}Help" class="form-text text-danger">{{ $errors->first($name) }}</div>
    @enderror

</div>
