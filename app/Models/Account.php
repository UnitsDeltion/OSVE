<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 * 
 * @property string $e-mail
 * @property string $naam
 * @property string $wachtwoord
 * @property int $rol
 * 
 * @property Collection|Examen[] $examens
 *
 * @package App\Models
 */
class Account extends Model
{
	protected $table = 'accounts';
	protected $primaryKey = 'e-mail';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'rol' => 'int'
	];

	protected $fillable = [
		'naam',
		'wachtwoord',
		'rol'
	];

	public function examens()
	{
		return $this->hasMany(Examen::class, 'geplande_docenten');
	}
}
