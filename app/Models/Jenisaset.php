<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisaset extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'tbl_jenis_aset';

    /**
     * filllable
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'kode'
    ];
}
