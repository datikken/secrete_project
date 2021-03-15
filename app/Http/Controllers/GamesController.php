<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function floppy()
    {
        return view('games.floppy.floppy');
    }

    public function solitaire()
    {
        return view('games.solitaire.solitaire');
    }

    public function chess()
    {
        return view('games.chess.chess');
    }

    public function shooter()
    {
        return view('games.shooter.shooter');
    }

    public function cattrap()
    {
        return view('games.cattrap.cattrap');
    }
}
