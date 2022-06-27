<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Signosvitale
 *
 * @property $id
 * @property $ritmoCardiaco
 * @property $caloriasQuemadas
 * @property $pasosDiarios
 * @property $distanciaRecorrida
 * @property $idExpediente
 * @property $created_at
 * @property $updated_at
 *
 * @property Expediente $expediente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Signosvitale extends Model
{
    
    static $rules = [
		'ritmoCardiaco' => 'required',
		'caloriasQuemadas' => 'required',
		'pasosDiarios' => 'required',
		'distanciaRecorrida' => 'required',
		'idExpediente' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ritmoCardiaco','caloriasQuemadas','pasosDiarios','distanciaRecorrida','idExpediente'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function expediente()
    {
        return $this->hasOne('App\Models\Expediente', 'id', 'idExpediente');
    }
    

}
