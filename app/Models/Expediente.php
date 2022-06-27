<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Expediente
 *
 * @property $id
 * @property $noExpediente
 * @property $idPaciente
 * @property $idDoctor
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Signosvitale[] $signosvitales
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Expediente extends Model
{
    
    static $rules = [
		'noExpediente' => 'required',
		'idPaciente' => 'required',
		'idDoctor' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['noExpediente','idPaciente','idDoctor','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signosvitales()
    {
        return $this->hasMany('App\Models\Signosvitale', 'idExpediente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'idDoctor');
        
    }

    public function user2()
    {
        return $this->hasOne('App\Models\User', 'id', 'idPaciente');
        
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    
    

}
