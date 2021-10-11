<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenSoort extends Model
{
    use HasFactory;

    protected $table = 'soort_examen';

	protected $primaryKey = 'id';

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }
}
