<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Option;
use App\Models\Character;
use App\Models\Spell;

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
        $user = auth()->user();
        Log::debug($user);
        return view('createPlayer', ['options' => Option::first()]);
    }

    public function getCantripsKnown()
    {
        $user = auth()->user();
        $character = Character::where('user_id', $user->_id)->first();
        return Spell::whereIn('Name', $character->cantrips_known)->get();
        
    }

    public function createNewPlayer(Request $request)
    {
        $user = auth()->user();
        $character = new Character;
        $character->user_id = $user->_id;
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
    public function format()
    {
        $this->getCantripsKnown();
        Log::debug(Spell::get());
    }
}
