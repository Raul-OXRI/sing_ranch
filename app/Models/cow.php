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
        'status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'cod_user');
    }

    public function getPuedeAgregarCriaAttribute(): bool
    {
        if ($this->sexo !== 'hembra') {
            return false;
        }

        $hoy = \Carbon\Carbon::now();

        $nacimientoOK = $this->birth_date
            ? \Carbon\Carbon::parse($this->birth_date)->diffInMonths($hoy) >= 15
            : false;

        $ingresoOK = $this->entry_date
            ? \Carbon\Carbon::parse($this->entry_date)->diffInMonths($hoy) >= 15
            : false;

        // Si cumple 15 meses desde nacimiento o desde que entró, puede agregar cría
        return $nacimientoOK || $ingresoOK;
    }
}
