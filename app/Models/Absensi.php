<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_absensi';

    /**
     * The primary key of the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_absen';

    /**
     * The attribute that are mass assignable.
     */
    protected $fillable = [
        'id_siswa',
        'keterangan',
        'tanggal',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    public function formatTanggal() {
        $_ = new Carbon($this->tanggal);
        return $_->format('d D Y');
    }
}
