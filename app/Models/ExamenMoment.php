<?php



namespace App\Models;
/**
 * Created by Reliese Model.
 */



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
	protected $primaryKey = 'id';
	protected $table = 'examen_moment';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'examenid' => 'int',
		'plaatsen' => 'int'
	];

	protected $fillable = [
		'examenid',
		'tijd',
		'plaatsen'
	];

	public function examen()
	{
		return $this->belongsTo(Examen::class, 'id', 'examenid' );
	}

	public function geplande_examen()
	{
		return $this->hasMany(GeplandeExaman::class, 'examen');
	}
}
