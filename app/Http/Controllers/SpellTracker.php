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

    //TODO refactor all of this
    public function getCantripsKnown() //temporary, belongs on the model
    {
        $user = auth()->user();
        $character = Character::where('user_id', $user->_id)->first();
        return Spell::whereIn('Name', $character->cantrips_known)->get();
        
    }
    public function getSubclassSpells() //temporary, belongs on the model
    {
        $user = auth()->user();
        $character = Character::where('user_id', $user->_id)->first();
        return Spell::whereIn('Name', $character->subclass_spells)->get();
        
    }
    public function getPreparedSpells() //temporary, belongs on the model
    {
        $user = auth()->user();
        $character = Character::where('user_id', $user->_id)->first();
        return Spell::whereIn('Name', $character->prepared_spells)->get();
        
    }
    public function getSpellsKnown() //temporary, belongs on the model
    {
        $user = auth()->user();
        $character = Character::where('user_id', $user->_id)->first();
        return Spell::whereIn('Name', $character->spells_known)->get();
        
    }
    public function show()
    {
        $character = Character::where('user_id', auth()->user()->_id)->first(); // still TEMPORARY! will add support for multiple characters later
    

        return view('welcome', [
            'spells' => Spell::where('Classes', 'like', '%' . ucfirst($character->class) . '%')->orderBy('Name')->get()->toJson(),
            'character' => $character->toJson(),
            'cantripsKnown' => $this->getCantripsKnown(),
            'preparedSpells' => $this->getPreparedSpells(),
            'subclassSpells' => $this->getSubclassSpells(),
            'spellsKnown' => $this->getSpellsKnown()
        ]);
    }
}
