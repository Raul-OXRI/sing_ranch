<?php

namespace App\Http\Controllers;

use App\Models\Cow;
use Illuminate\Http\Request;

abstract class Controller
{
    //
    public function dashboar()
    {
        $totalregistro = Cow::count();
        return view('dashboard', compact('totalregistro'));
    }
}
