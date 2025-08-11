<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';
    protected $primaryKey = 'id_periode';
    protected $fillable = ['bulan', 'tahun'];
//    protected $with = ['sebaran'];
    protected $appends = ['nama_bulan'];

    public function getNamaBulanAttribute()
    {
        return Carbon::create()->month($this->bulan)->translatedFormat('F');
    }

    public function sebaran()
    {
        return $this->hasMany(Sebaran::class, 'id_periode', 'id_periode')->orderBy('nilai', 'DESC');
    }
}
