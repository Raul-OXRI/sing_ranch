<?php

namespace App\Exports;

use App\Models\Cowhistory;
use App\Models\cow;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CowhistoryExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $cowId;


    public function __construct($cowId)
    {
        $this->cowId = $cowId;
    }

    public function view(): View
    {
         $ranchday = Cowhistory::with('cow') 
            ->where('cow_id', $this->cowId)
            ->get();
        $cow = Cow::find($this->cowId); 

        // $ranchday = Cowhistory::where('cow_id', $this->cowId)->select(
        //     'weight_date',
        //     'int_weight',
        //     'vaccine_date',
        //     'deworming_date',
        //     'health_check_date',
        //     'feel_date',
        //     'antirabies_date',
        //     'steroids_date',
        //     'antibiotics_date',
        //     'vitamins_date',
        //     'serum_date',
        //     'notes',
        // )->get();
        return view('RanchDay.from-excel', compact('ranchday' , 'cow'));
    }
}
