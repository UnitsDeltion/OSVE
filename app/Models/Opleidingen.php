<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Opleidingen
 * 
 * @property int $crebo_nr
 * @property string $opleiding
 * 
 * @property Collection|Examen[] $examens
 *
 * @package App\Models
 */
class Opleidingen extends Model
{
	protected $primaryKey = 'crebo_nr';
	protected $table = 'opleidingen';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'crebo_nr' => 'int'
	];

	protected $fillable = [
		'crebo_nr',
		'opleiding'
	];

	public function examens()
	{
		return $this->hasMany(Examen::class, 'crebo_nr', 'crebo_nr');
	}
}
