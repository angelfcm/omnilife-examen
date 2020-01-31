<div class="form-group">
    <div class="{{ $errors->has($name) ? 'has-error' : '' }}">
        <label for="code" class="text-muted">{{ $title }}</label>
        <input id="code" name="code" type="text" class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}" />
    </div>
    @if ($errors->has($name))
    <ul class="mb-0">
        @foreach($errors->get($name) as $message)
            <li class="invalid-feedback">
                - {{ $message }}
            </li>
        @endforeach
    </ul>
    @endif
</div>