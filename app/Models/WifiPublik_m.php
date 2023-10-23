<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WifiPublik_m extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wifi_publik';

    protected $guarded = [];

    public function wifipublik_rusak()
    {
        return $this->hasOne(PerangkatRusak_m::class, 'sn');
    }
}
