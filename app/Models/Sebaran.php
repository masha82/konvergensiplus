<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sebaran extends Model
{
    protected $table = 'sebaran';
    protected $fillable = ['id_kec', 'nama_kecamatan', 'latitude', 'longitude', 'nilai', 'id_periode'];
    protected $primaryKey = 'id_sebaran';


    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id_periode');
    }
}
