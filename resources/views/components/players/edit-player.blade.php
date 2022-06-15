
<div class="col-4 mx-auto mt-4">
    <h1>Edit Player</h1>
    <form method="POST" action="{{ url('players/' . $player->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group ">
            <label for="image">Image</label>
            @if($player->image)
                <img src="{{asset('storage/'.$player->image)}}" width="200px">
            @else
                <p>
                    NO IMAGE
                </p>
            @endif
            <input type="file"
                   id="image"
                   name="image"
                   autocomplete="image"
                   class="form-control"
                   value="{{ $player->image }}"
                   required>
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                autocomplete="name"
                placeholder="Type your name"
                class="form-control
            @error('name') is-invalid @enderror"
                value="{{ $player->address }}"
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
                value="{{$player->address}}"
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
                class="form-control
            @error('description') is-invalid @enderror"
                value="{{ old('description') }}"
                required>{{$player->description}}</textarea>

            <small id="nameHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>

            @error('description')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
            <label for="retired">Retired</label><br>
            <input type="radio" id="yes" name="retired" @if($player->retired) checked @endif value="0">
            <label for="yes">Yes</label>
            <input type="radio" id="no" name="retired" @if(!$player->retired) checked @endif value="1">
            <label for="no">No</label>
        </div>

        <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
    </form>
</div>
