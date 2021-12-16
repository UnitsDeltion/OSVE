<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
    use HasFactory;
    
    protected $table = 'reglement';
    public $timestamps = false;

    protected $fillable = [
        'reglement',
	];
}
