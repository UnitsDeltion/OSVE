<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GeplandeExaman
 * 
 * @property int $id
 * @property string $student_nr
 * @property int $examen
 * @property string $faciliteiten_pas
 * @property string $bijzonderheden
 * @property string $opmerkingen
 * 
 * @property ExamenMoment $examen_moment
 *
 * @package App\Models
 */
class GeplandeExamens extends Model
{
	protected $table = 'geplande_examens';
	// public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'examen' => 'int'
	];

	protected $fillable = [
		'voornaam',
		'achternaam',
		'faciliteitenpas',
		'studentnummer',
		'klas',
		'opleiding_id',
		'examen',
		'examen_moment',
		'opmerkingen',
		'active'
	];

	public function examen_moment()
	{
		return $this->belongsTo(ExamenMoment::class, 'examen');
	}
}
