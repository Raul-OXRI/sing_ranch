<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class cow extends Model
{
    protected $table = 'cows';

    protected $fillable = [
        'animal_code',
        'entry_date',
        'birth_date',
        'sexo',
        'month_code',
        'cod_user',
        'status',
        'death_date',
        'sold_date'
    ];

    public function getSoldDateFormattedAttribute()
    {
        return $this->sold_date ? Carbon::parse($this->sold_date)->format('Y-m-d') : null;
    }

    public function getDeathDateFormattedAttribute()
    {
        return $this->death_date ? Carbon::parse($this->death_date)->format('Y-m-d') : null;
    }

    public function getEdadAttribute(): string
    {
        if (!$this->birth_date) {
            return '-';
        }
        $fechaNacimiento = Carbon::parse($this->birth_date);
        $fechaActual = now();

        $diferencia = $fechaNacimiento->diff($fechaActual);

        return "{$diferencia->y} años {$diferencia->m} meses";
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'cod_user');
    }
}
