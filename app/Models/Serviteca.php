<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Input, Validator;

class Serviteca extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'serviteca';

    public $timestamps = false;

    protected $fillable = ['serviteca_nombre', 'serviteca_direccion', 'serviteca_telefono', 'serviteca_email', 'serviteca_latitud', 'serviteca_longitud','serviteca_horario', 'serviteca_servicios'];

    public function isValid($data)
    {
        $rules = [
            'serviteca_nombre' => 'required|min:4|max:200',
            'serviteca_direccion' => 'required|max:200',
            'serviteca_latitud' => 'required',
            'serviteca_longitud' => 'required',
            'serviteca_longitud' => 'required',
            'serviteca_horario' => 'required|max:100',
            'serviteca_servicios' => 'required|max:200'
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            return true;
        }
        $this->errors = $validator->errors();
        return false;

    }

    public function validAndSave($data)
    {
        if ($this->isValid($data))
        {
            $this->fill($data);
            $this->save();
            return true;
        }
        return false;
    }

    public static function getApiData()
    {
        $query = Serviteca::query();
        return $query->get();
    }

	public static function getData()
    {
        $query = self::query();
        if (Input::has("serviteca_nombre")) {
            $query->where('serviteca_nombre', 'like', '%'.Input::get("serviteca_nombre").'%');
        }
        $query->orderby('serviteca_nombre', 'DESC');
        return $query->paginate();
    }

    public function setServitecaNombreAttribute($name){
        $this->attributes['serviteca_nombre'] = strtoupper($name);
    }
}
