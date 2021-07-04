<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;

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
}
