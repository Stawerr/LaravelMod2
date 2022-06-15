@extends('master.main')

@section('content')
<div class="col-4 mx-auto mt-4">
    <h1>Show Player</h1>
        <div class="form-group">
            <label for="image">Image</label><p></p>
            @if($player->image)
                <img src="{{asset('storage/'.$player->image)}}" width="200px">
            @else
                <p>
                    NO IMAGE
                </p>
            @endif
            <p></p>
            <label for="name">Name</label>
            <input
                class="form-control"
                type="text"
                id="name"
                name="name"
                autocomplete="name"
                value="{{$player->name}}"
                required
                disabled
                aria-describedby="nameHelp">

            <small id="nameHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>

            <label for="address">Address</label>
            <input
                class="form-control"
                type="text"
                id="address"
                name="address"
                autocomplete="address"
                value="{{ $player->address }}"
                required
                disabled
                aria-describedby="nameHelp">

            <label for="description">Description</label>
            <textarea
                class="form-control"
                id="description"
                name="description"
                autocomplete="description"
                disabled
                required>{{$player->description}}</textarea>

            <label for="retired">Retired</label><br>
            <input type="radio" id="yes" name="retired" @if($player->retired) checked @endif disabled >
            <label for="yes">Yes</label>
            <input type="radio" id="no" name="retired" @if(!$player->retired) checked @endif disabled>
            <label for="no">No</label>
        </div>

        <a class="mt-2 mb-5 btn btn-primary" href="{{url('players/')}}">Back</a>
</div>
@endsection



