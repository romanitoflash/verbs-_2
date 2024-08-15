<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verb extends Model
{
    use HasFactory;
    protected $table = 'verbs';
    protected $primaryKey = 'id_verb';
    public $timestamps = false;
    protected $fillable=['type_verb',
    'simpler_fom',
    'third_person',
    'simple_past',
    'past_participle',
    'gerund',
    'meaning'
];
}
