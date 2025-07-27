<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cowhistory extends Model
{
    //
    protected $table = 'cowhistory';
    protected $fillable = [
        'weight',
        'weight_date',
        'int_weight',
        'vaccine',
        'vaccine_date',
        'deworming',
        'deworming_date',
        'health_check',
        'health_check_date',
        'feel',
        'feel_date',
        'antirabies',
        'antirabies_date',
        'steroids',
        'steroids_date',
        'antibiotics',
        'antibiotics_date',
        'vitamins',
        'vitamins_date',
        'serum',
        'serum_date',
        'notes',
        'cow_id'
    ];

    public function cow()
    {
        return $this->belongsTo(Cow::class, 'cow_id');
    }
}
