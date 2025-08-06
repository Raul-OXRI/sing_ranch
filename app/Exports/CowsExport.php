<?php

namespace App\Exports;

use App\Models\cow;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CowsExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */



    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
    }


    public function view(): View
    {
        $cow = collect();

        switch ($this->status) {
            case 1:
                $cows = Cow::with('user')->where('status', 1)->get();
                break;
            case 2:
                $cows = Cow::with('user')->where('status', 3)->get();
                break;
            case 3:
                $cows = Cow::with('user')->where('status', 2)->get();
                break;
        }
        

        return view('Cows.from-excel', compact('cows'));
    }
}
