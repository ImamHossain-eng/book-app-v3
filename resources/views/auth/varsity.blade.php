<div class="form-group row">
    <label for="varsity" class="col-md-4 col-form-label text-md-right">{{ __('University Name') }}</label>

    <div class="col-md-6">
        <select name="varsity" class="form-control">
            <option value="null">Choose University Name</option>
            @foreach($varsities as $v)
                <option value="{{$v->id}}"> {{$v->name}} </option>
            @endforeach
        </select>

        @error('varsity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>