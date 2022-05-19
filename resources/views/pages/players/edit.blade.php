@extends('master.main')

@section('content')

    @component('components.players.edit-player', [
                       'player' =>$player,
                   ])
    @endcomponent

@endsection
