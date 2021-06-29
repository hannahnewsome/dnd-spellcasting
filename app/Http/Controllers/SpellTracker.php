<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Spell;


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
        $class = 'Cleric'; //TEMPORARY! need new functionality to handle classes, this is just for testing

        return view('welcome', [
            'spells' => Spell::where('Classes', 'like', '%' . $class . '%')->get()->toJson()
        ]);
    }
}
