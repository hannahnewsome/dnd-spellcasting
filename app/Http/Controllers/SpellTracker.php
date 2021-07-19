<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Spell;
use App\Models\Character;


class SpellTracker extends Controller
{
    /**
     * Show the spells
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $character = Character::where('user_id', auth()->user()->_id)->first(); // still TEMPORARY! will add support for multiple characters later
    

        return view('welcome', [
            'spells' => Spell::where('Classes', 'like', '%' . ucfirst($character->class) . '%')->get()->toJson(),
            'character' => $character->toJson()
        ]);
    }
}
