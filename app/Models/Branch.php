<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'tbl_branch';

    /**
     * filllable
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'kode'
    ];
}
