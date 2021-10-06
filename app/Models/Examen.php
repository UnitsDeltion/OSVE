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
 * @property string $examen
 * @property int $plaatsen
 * @property string $geplande_docenten
 * 
 * @property Opleidingen $opleidingen
 * @property Account $account
 * @property Collection|ExamenMoment[] $examen_moments
 *
 * @package App\Models
 */
class Examen extends Model
{
	protected $table = 'examens';
	protected $primaryKey = 'examen';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'crebo_nr' => 'int',
		'plaatsen' => 'int'
	];

	protected $fillable = [
		'crebo_nr',
		'plaatsen',
		'geplande_docenten'
	];

	public function opleidingen()
	{
		return $this->belongsTo(Opleidingen::class, 'crebo_nr', 'crebo_nr');
	}

	public function account()
	{
		return $this->belongsTo(Account::class, 'geplande_docenten');
	}

	public function examen_moments()
	{
		return $this->hasMany(ExamenMoment::class, 'examenid', 'crebo_nr');
	}
}
