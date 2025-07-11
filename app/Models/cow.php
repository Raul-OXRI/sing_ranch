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


    public function user()
    {
        return $this->belongsTo(User::class, 'cod_user');
    }

    public function calves()
    {
        return $this->hasMany(Calves::class, 'cod_cow');
    }
}
