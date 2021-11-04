<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeplandeExamensTokens extends Model
{
    use HasFactory;

	public $timestamps = false;

    protected $fillable = [
		'studentnummer',
		'gepland_examen_id',
		'token',
	];
}
