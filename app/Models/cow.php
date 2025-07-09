<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cow extends Model
{
    protected $table = 'cows';

    protected $fillable = [
        'animal_code',
        'entry_date',
        'sexo',
        'cod_user',
        'status'
    ];

    public function getAgeInMonthsAttribute()
    {
        $diff = $this->birth_date->diff($this->entry_date);

        $years = $diff->y;
        $months = $diff->m;

        if ($years > 0 && $months > 0) {
            return "$years años y $months meses";
        } elseif ($years > 0) {
            return "$years años";
        } else {
            return "$months meses";
        }
    }


    public function getFullDescriptionAttribute()
    {
        return "{$this->animal_code} is a {$this->sexo} cow, born on {$this->birth_date}, entered on {$this->entry_date}.";
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'cod_user');
    }
}
