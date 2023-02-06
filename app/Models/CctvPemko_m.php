<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CctvPemko_m extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cctv_pemko';

    //protected $fillable = ['sn, merk_cctv, tipe, letak, tahun'];
    protected $guarded = [];
}
