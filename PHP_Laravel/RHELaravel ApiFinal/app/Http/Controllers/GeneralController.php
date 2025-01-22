<?php

namespace App\Http\Controllers;

use App\Models\Pieces;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index(){
        $pieces = Piece::paginate(10);
        return view('listpieces', compact('pieces'));
    }
}