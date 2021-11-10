<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExamenMoment
 * 
 * @property int $id
 * @property int $examenid
 * @property string $datum
 * @property string $tijd
 * 
 * @property Examen $examen
 * @property Collection|GeplandeExaman[] $geplande_examen
 *
 * @package App\Models
 */
class ExamenMoment extends Model
{
	protected $table = 'examen_moment';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'examenid' => 'int'
	];

	protected $fillable = [
		'voornaam',
		'achternaam',
		'faciliteiten_pas',
		'student_nr',
		'klas',
		'crebo_nr',
		'examen',
		'examen_moment',
		'opmerkingen',
	];

	public function examen()
	{
		return $this->belongsTo(Examen::class, 'examenid', 'crebo_nr');
	}

	public function geplande_examen()
	{
		return $this->hasMany(GeplandExaman::class, 'examen');
	}
}
