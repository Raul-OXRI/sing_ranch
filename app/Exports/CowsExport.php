<?php

namespace App\Exports;

use App\Models\cow;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CowsExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $cows = cow::where('status', 1)->get();
        
        return view('exports.cows', compact('cows'));
    }
}
