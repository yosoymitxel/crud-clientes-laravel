<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="cliente_id" class="form-label">{{ __('Cliente Id') }}</label>
            <input type="text" name="cliente_id" class="form-control @error('cliente_id') is-invalid @enderror" value="{{ old('cliente_id', $address?->cliente_id) }}" id="cliente_id" placeholder="Cliente Id">
            {!! $errors->first('cliente_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="street" class="form-label">{{ __('Street') }}</label>
            <input type="text" name="street" class="form-control @error('street') is-invalid @enderror" value="{{ old('street', $address?->street) }}" id="street" placeholder="Street">
            {!! $errors->first('street', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="suite" class="form-label">{{ __('Suite') }}</label>
            <input type="text" name="suite" class="form-control @error('suite') is-invalid @enderror" value="{{ old('suite', $address?->suite) }}" id="suite" placeholder="Suite">
            {!! $errors->first('suite', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="city" class="form-label">{{ __('City') }}</label>
            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $address?->city) }}" id="city" placeholder="City">
            {!! $errors->first('city', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="zipcode" class="form-label">{{ __('Zipcode') }}</label>
            <input type="text" name="zipcode" class="form-control @error('zipcode') is-invalid @enderror" value="{{ old('zipcode', $address?->zipcode) }}" id="zipcode" placeholder="Zipcode">
            {!! $errors->first('zipcode', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lat" class="form-label">{{ __('Lat') }}</label>
            <input type="text" name="lat" class="form-control @error('lat') is-invalid @enderror" value="{{ old('lat', $address?->lat) }}" id="lat" placeholder="Lat">
            {!! $errors->first('lat', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lng" class="form-label">{{ __('Lng') }}</label>
            <input type="text" name="lng" class="form-control @error('lng') is-invalid @enderror" value="{{ old('lng', $address?->lng) }}" id="lng" placeholder="Lng">
            {!! $errors->first('lng', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>