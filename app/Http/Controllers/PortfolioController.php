<?php

namespace App\Http\Controllers;

use App\Models\Multipic;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function Portfolio()
    {
        $images = Multipic::all();
        return view('pages.portfolio', compact('images'));
    }
}
