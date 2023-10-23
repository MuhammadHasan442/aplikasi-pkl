<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatRusak_m extends Model
{

    protected $table = 'perangkat_rusak';

    protected $guarded = [];

    public function access_point()
    {
        return $this->belongsTo(AccessPoint_m::class, 'sn');
    }

    public function cctv_pemko()
    {
        return $this->belongsTo(CctvPemko_m::class, 'sn');
    }

    public function cctv_publik()
    {
        return $this->belongsTo(CctvPublik_m::class, 'sn');
    }

    public function data_server()
    {
        return $this->belongsTo(Server_m::class, 'sn');
    }

    public function nvr_cctv()
    {
        return $this->belongsTo(NvrCctv_m::class, 'sn');
    }

    public function wifi_publik()
    {
        return $this->belongsTo(WifiPublik_m::class, 'sn');
    }

    public function perangkat_jar()
    {
        return $this->belongsTo(PernagkatJar_m::class, 'sn');
    }
}
