<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Character;

class CharacterController extends Controller
{
    /**
     * Show the character creation page
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show()
    {

        return view('createPlayer', ['options' => Option::first()]);
    }

    public function createNewPlayer(Request $request)
    {
        $character = new Character;
        $character->user_id = 1; //temporary until I get auth set up
        $character->name = $request->charName;
        $character->ac = $request->charAC;
        $character->speed = $request->charSpeed;
        $character->str = $request->charStr;
        $character->dex = $request->charDex;
        $character->con = $request->charCon;
        $character->int = $request->charInt;
        $character->wis = $request->charWis;
        $character->cha = $request->charCha;
        $character->hp = $request->charHP;
        $character->class = $request->job;
        $character->race = $request->race;
        $character->level = $request->charLvl;
        $character->background = $request->background;
        $character->save();
        return view('createPlayer', ['options' => Option::first()]);
    }
}
