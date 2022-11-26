<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_siswa';

    /**
     * The primary key of the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_siswa';

    /**
     * The attribute that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'notelp',
    ];

    public function absensi() {
        return $this->hasMany(Absensi::class, 'id_absen');
    }
}
