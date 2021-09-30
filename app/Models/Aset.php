<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'tbl_aset';

    /**
     * filllable
     *
     * @var array
     */
    protected $fillable = [
        'id_jenis', 'id_branch', 'kode_unik', 'link_qr_code'
    ];
}
