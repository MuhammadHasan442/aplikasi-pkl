<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CctvPublik_m extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cctv_publik';

    //protected $fillable = ['sn, merk_cctv, tipe, letak, tahun'];
    protected $guarded = [];

    public function cctvpublik_rusak()
    {
        return $this->hasOne(PerangkatRusak_m::class, 'sn');
    }
}
