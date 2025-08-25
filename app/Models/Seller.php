<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Seller extends Model
{
    //
    protected $table = 'seller';

    protected $fillable = [
        'unit_price',
        'final_weight',
        'by_sight',
        'token_expire',
        'cow_id',
        'cod_user'
    ];

    protected $dates = ['token_expire'];

    public function hasValidToken(): bool
    {
        return $this->token_expire && $this->token_expire->isFuture();
    }

    public function invalidateToken(): void
    {
        $this->token_expire = null;
        $this->save();
    }

    public function generateToken(int $hores = 8): void
    {
        $this->token_expire = Carbon::now()->addHours($hores);
        $this->save();
    }

    public function cow(){
        return $this->belongsTo(cow::class, 'cow_id');
    }
}
