<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessPoint_m extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'access_point';

    //protected $fillable = ['sn, merk_ap, tipe, nama_ap, letak, tahun'];
    protected $guarded = [];
}
