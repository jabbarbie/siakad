<?php

namespace Stmik;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Mahasiswa
 * User: Toni
 * @package App
 */
class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nomor_induk';
    public $incrementing = false;

    /**
     * Link ke nama jurusan dll.
     * @return BelongsTo
     */
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    /**
     * dosenPembimbing merupakan hubungan many-to-many dengan Dosen, karena nilai FK pada table pembimbing adalah
     * default maka tidak dibutuhkan untuk menentukan pula nama field FK disini, kecuali nama table yang custom
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dosenPembimbing()
    {
        return $this->belongsToMany(Dosen::class, 'pembimbing');
    }

    /**
     * Memiliki rencana studi apa saja mahasiswa ini?
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rencanaStudi()
    {
        return $this->hasMany(RencanaStudi::class, 'mahasiswa_id');
    }
}
