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
        return view('welcome', [
            'spells' => Spell::get()
        ]);
    }
}
