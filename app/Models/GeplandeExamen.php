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
class GeplandeExamen extends Model
{
	protected $table = 'geplande_examen';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'examen' => 'int'
	];

	protected $fillable = [
		'student_nr',
		'klas',
		'examen',
		'faciliteiten_pas',
		'opmerkingen'
	];

	public function examen_moment()
	{
		return $this->belongsTo(ExamenMoment::class, 'examen');
	}
}
