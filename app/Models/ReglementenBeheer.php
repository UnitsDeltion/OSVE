<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReglementenBeheer extends Model
{
    use HasFactory;
    
    protected $table = 'reglementen';
    public $timestamps = false;

    protected $fillable = [
		  'reglementen',
	];
}