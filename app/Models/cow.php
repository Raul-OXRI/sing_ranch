<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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

    public static function getLatestHistoryDetails($cowId)
    {
        return DB::table('cows')
            ->select([
                'cows.id as cow_id',
                'cows.animal_code',
                DB::raw("(SELECT int_weight FROM cowhistory WHERE cow_id = cows.id AND weight = 1 ORDER BY weight_date DESC LIMIT 1) AS latest_weight"),
                DB::raw("(SELECT weight_date FROM cowhistory WHERE cow_id = cows.id AND weight = 1 ORDER BY weight_date DESC LIMIT 1) AS latest_weight_date"),
                DB::raw("(SELECT vaccine_date FROM cowhistory WHERE cow_id = cows.id AND vaccine = 1 ORDER BY vaccine_date DESC LIMIT 1) AS latest_vaccine_date"),
                DB::raw("(SELECT deworming_date FROM cowhistory WHERE cow_id = cows.id AND deworming = 1 ORDER BY deworming_date DESC LIMIT 1) AS latest_deworming_date"),
                DB::raw("(SELECT health_check_date FROM cowhistory WHERE cow_id = cows.id AND health_check = 1 ORDER BY health_check_date DESC LIMIT 1) AS latest_health_check_date"),
                DB::raw("(SELECT feel_date FROM cowhistory WHERE cow_id = cows.id AND feel = 1 ORDER BY feel_date DESC LIMIT 1) AS latest_feel_date"),
                DB::raw("(SELECT antirabies_date FROM cowhistory WHERE cow_id = cows.id AND antirabies = 1 ORDER BY antirabies_date DESC LIMIT 1) AS latest_antirabies_date"),
                DB::raw("(SELECT steroids_date FROM cowhistory WHERE cow_id = cows.id AND steroids = 1 ORDER BY steroids_date DESC LIMIT 1) AS latest_steroids_date"),
                DB::raw("(SELECT antibiotics_date FROM cowhistory WHERE cow_id = cows.id AND antibiotics = 1 ORDER BY antibiotics_date DESC LIMIT 1) AS latest_antibiotics_date"),
                DB::raw("(SELECT vitamins_date FROM cowhistory WHERE cow_id = cows.id AND vitamins = 1 ORDER BY vitamins_date DESC LIMIT 1) AS latest_vitamins_date"),
                DB::raw("(SELECT serum_date FROM cowhistory WHERE cow_id = cows.id AND serum = 1 ORDER BY serum_date DESC LIMIT 1) AS latest_serum_date"),
                DB::raw("(SELECT notes FROM cowhistory WHERE cow_id = cows.id AND notes IS NOT NULL ORDER BY created_at DESC LIMIT 1) AS latest_notes"),
            ])
            ->where('cows.id', $cowId)
            ->first();
    }

    
}
