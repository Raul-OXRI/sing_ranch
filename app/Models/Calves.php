<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Calves extends Model
{
    //
    protected $table = 'calves';
    protected $fillable = [
        'animal_code',
        'birth_date',
        'sexo',
        'cod_user',
        'cod_cow',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'cod_user');
    }

    public function cow()
    {
        return $this->belongsTo(cow::class, 'cod_cow');
    }

    public function getIsReadyToCalveAttribute(): bool
    {
        return Carbon::parse($this->birth_date)
                     ->addMonths(15)     // 15 meses después
                     ->lte(now());       // ¿ya llegamos?
    }
}
