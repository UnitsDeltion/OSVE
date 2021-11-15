<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Examen
 * 
 * @property int $crebo_nr
 * @property int $examen_id
 * @property string $examen
 * @property int $plaatsen
 * @property string $geplande_docenten
 * 
 * @property Opleidingen $opleidingen
 * @property Examen
 * @property User $user
 * @property Collection|ExamenMoment[] $examen_moments
 *
 * @package App\Models
 */
class Examen extends Model 
{
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'crebo_nr' => 'int',
	];

	protected $fillable = [
		'examen',
		'vak',
		'crebo_nr',
		'examen',
		'geplande_docenten',
		'examen_type',
		'examen_opgeven_begin',
		'examen_opgeven_eind',
		'uitleg',
		
	];


	public function opleidingen()
	{
		return $this->belongsTo(Opleidingen::class, 'crebo_nr', 'crebo_nr');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'geplande_docenten', 'email');
	}


	public function examen_moments()
	{
		return $this->hasMany(ExamenMoment::class, 'examenid', 'id');
	}
}
