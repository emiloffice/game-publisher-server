<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $game = new Game;
        $games = $game::all();
        return view('admin.index', compact('games'));
    }
}
