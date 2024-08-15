<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adjetive extends Model
{
    use HasFactory;
    protected $table = 'adjetivos';
    protected $primaryKey = 'id_adj';
    public $timestamps = false;

    protected $fillable = [
        'Adjetivo_positivo',
        'Comparativo',
        'Superlativo',
        'Traduccion'

    ];
}
