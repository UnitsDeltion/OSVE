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
 * @property User $user
 * @property Collection|ExamenMoment[] $examen_moments
 *
 * @package App\Models
 */
class Examen extends Model 
{
	protected $table = 'examens';
	protected $primaryKey = 'examen';
	public $timestamps = false;

	protected $casts = [
		'crebo_nr' => 'int',
		'plaatsen' => 'int'
	];

	protected $fillable = [
		'crebo_nr',
		'examen',
		'plaatsen',
		'geplande_docenten'
	];

	public function opleidingen()
	{
		return $this->belongsTo(Opleidingen::class, 'crebo_nr', 'crebo_nr');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'geplande_docenten', 'email');
	}

	// public function examen_koppel_soort()
	// {
	// 	return $this->hasMany(ExamenKoppelSoort::class);
	// }

	// public function examen_soort()
	// {
	// 	return $this->belongsTo(SoortExaman::class)->using(ExamenKoppelSoort::class);
	// }

	public function examensoorten()
	{
		return $this->hasMany(ExamenSoort::class);
	}

	public function examen_moments()
	{
		return $this->hasMany(ExamenMoment::class, 'examenid', 'crebo_nr');
	}
}
