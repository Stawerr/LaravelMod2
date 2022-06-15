
<div class="col-4 mx-auto mt-4">
    <h1>Add Player</h1>
<form method="POST" action="{{ url('players') }} "enctype="multipart/form-data">
    @csrf
    <div class="form-group ">
        <label for="image">Image</label>
        <input type="file"
               id="image"
               name="image"
               autocomplete="image"
               class="form-control
                @error('image') is-invalid @enderror"
               value="{{old('image') }}"
               required>
        @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message }}</strong>
        </span>@enderror

        <label for="name">Name</label>
        <input
            type="text"
            id="name"
            name="name"
            autocomplete="name"
            placeholder="Type your name"
            class="form-control
            @error('name') is-invalid @enderror"
            value="{{ old('name') }}"
            required
            aria-describedby="nameHelp">
        <small id="nameHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label for="address">Address</label>
        <input
            type="text"
            id="address"
            name="address"
            autocomplete="address"
            placeholder="Type your address"
            class="form-control
            @error('address') is-invalid @enderror"
            value="{{ old('address') }}"
            required
            aria-describedby="nameHelp">
        <small id="nameHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
            @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label for="description">Description</label>
        <textarea
            id="description"
            name="description"
            autocomplete="description"
            placeholder="Type your description"
            class="form-control"
            @error('description') is-invalid @enderror
            required>{{ old('description') }}</textarea>
        <small id="nameHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label for="retired">Retired</label><br>
        <input type="radio" id="yes" name="retired" value="0">
        <label for="yes">Yes</label>
        <input type="radio" id="no" name="retired" value="1">
        <label for="no">No</label>
    </div>

    <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
</form>
</div>
