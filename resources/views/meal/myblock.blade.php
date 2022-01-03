<div class="form-group row">

    <label for="caption" class="col-md-4 col-form-label">Breakfast</label>

    <input id="breakfast"
           type="text"
           class="form-control{{ $errors->has('breakfast') ? ' is-invalid' : '' }}"
           name="breakfast"
           value="{{ old('breakfast') }}"
           autocomplete="name" autofocus>

    @if ($errors->has('breakfast'))
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('breakfast') }}</strong>
                        </span>
    @endif

</div>

<div class="form-group row">

    <label for="caption" class="col-md-4 col-form-label">Snack</label>

    <input id="snack"
           type="text"
           class="form-control{{ $errors->has('snack') ? ' is-invalid' : '' }}"
           name="snack"
           value="{{ old('snack') }}"
           autocomplete="name" autofocus>

    @if ($errors->has('snack'))
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('snack') }}</strong>
                        </span>
    @endif

</div>

<div class="form-group row">

    <label for="caption" class="col-md-4 col-form-label">Lunch</label>

    <input id="lunch"
           type="text"
           class="form-control{{ $errors->has('lunch') ? ' is-invalid' : '' }}"
           name="lunch"
           value="{{ old('lunch') }}"
           autocomplete="name" autofocus>

    @if ($errors->has('lunch'))
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lunch') }}</strong>
                        </span>
    @endif

</div>

<div class="form-group row">

    <label for="caption" class="col-md-4 col-form-label">Snack</label>

    <input id="snack"
           type="text"
           class="form-control{{ $errors->has('snack') ? ' is-invalid' : '' }}"
           name="snack"
           value="{{ old('snack') }}"
           autocomplete="name" autofocus>

    @if ($errors->has('snack'))
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('snack') }}</strong>
                        </span>
    @endif

</div>

<div class="form-group row">

    <label for="caption" class="col-md-4 col-form-label">Dinner</label>

    <input id="dinner"
           type="text"
           class="form-control{{ $errors->has('dinner') ? ' is-invalid' : '' }}"
           name="dinner"
           value="{{ old('dinner') }}"
           autocomplete="name" autofocus>

    @if ($errors->has('dinner'))
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('dinner') }}</strong>
                        </span>
    @endif

</div>

<div class="form-group row">

    <label for="caption" class="col-md-4 col-form-label">Snack</label>

    <input id="snack"
           type="text"
           class="form-control{{ $errors->has('snack') ? ' is-invalid' : '' }}"
           name="snack"
           value="{{ old('snack') }}"
           autocomplete="name" autofocus>

    @if ($errors->has('snack'))
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('snack') }}</strong>
                        </span>
    @endif

</div>
