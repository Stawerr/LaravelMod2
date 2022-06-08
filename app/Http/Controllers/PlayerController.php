<?php

namespace App\Http\Controllers;

use App\Imports\PlayersImport;
use App\Player;
use Illuminate\Http\Request;
use App\Exports\PlayersExport;
use Maatwebsite\Excel\Facades\Excel;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search==null){
            $players = Player::orderBy('id','desc')->paginate(15);
        }
            else{
                $players= Player::where('name', 'Like', '%' . $request->search . '%')->paginate(15);
            }

        /**
         $players = ($request->search)?
         *  Player::where('name', 'Like', '%' . $request->search . '%')->paginate(15):
         *  Player::orderBy('id','desc')->paginate(15);
         */

        return view('pages.players.index',['players'=>$players]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required',
            'address'     => 'required',
            'description'     => 'required',
            'retired'     => 'required',
            ]);

        Player::create([
            'name'        => $request->name,
            'address'     => $request->address,
            'description'     => $request->description,
            'retired'     => $request->retired,
            ]);

        /* Outra forma de inserir os dados
            $player = new Player();
            $player->name =$request->name;
            $player->address =$request->address;
            $player->save();
        */

        return redirect('players')->with('status','Player created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return view('pages.players.show',['player'=>$player]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        return view('pages.players.edit',['player'=>$player]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $player->update($request->all());
        return redirect('players')->with('status','Item edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect('players')->with('status','Item deleted successfully!');
    }
    public function destroyAll()
    {
        Player::truncate();
        return redirect('players')->with('status','Players deleted successfully!');
    }
    /**
    public function search(Request $request)
    {
        $players= Player::where('name', 'Like', '%' . $request->search . '%')->paginate(15);
        return view('pages.players.index',['players'=>$players]);
    }
     */

    public function export()
    {
        return Excel::download(new PlayersExport, 'players.xlsx');
    }
    public function import()
    {
        Excel::import(new PlayersImport, 'players.xlsx');

        return redirect('/')->with('success', 'All good!');
    }
}
