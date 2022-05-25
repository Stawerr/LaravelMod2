@if (session('status'))<div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('status') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">            <span aria-hidden="true">&times;</span>        </button>    </div>@endif
<h1>Players</h1>
<form action="{{url('players/destroyAll')}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button type="submit" class="btn btn-danger">Delete ALL</button></td>
</form>

<table class="table table-striped table-dark ">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Description</th>
        <th scope="col">Retired</th>
        <th scope="col">Actions</th>

    </tr>
    </thead>
    <tbody>
    @foreach($players as $player)
        <tr >
            <td> {{$player->id}}</td>
            <td>{{$player->name}}</td>
            <td>{{$player->address}}</td>
            <td>{{$player->description}}</td>
            <td>@if($player->retired)<i class="bi bi-emoji-smile text-success "></i> @else <i class="bi bi-emoji-smile-upside-down text-danger"></i> @endif</td>
            <td><a class="btn btn-success" href="{{url('players/'.$player->id)}}">Show</a></td>
            <td><a class="btn btn-primary" href="{{url('players/'.$player->id. '/edit')}}">Edit</a></td>
            <form action="{{url('players/' . $player->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <td><button type="submit" class="btn btn-danger">Delete</button></td>
            </form>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{$players->links()}}
</div>


