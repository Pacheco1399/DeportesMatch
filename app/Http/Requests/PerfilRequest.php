<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PerfilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => ['nullable', 'max:255'],
            'apellido_paterno' => ['nullable', 'string', 'max:255'],
            'apellido_materno' => ['nullable', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user()->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'fecha_nacimiento' => ['nullable', 'string'],
            'edad' => ['nullable', 'integer'],
            'nacionalidad' => ['nullable', 'string'],
            'numero_telefono' => ['nullable', 'integer', 'min:111111111'],
            'rut' => ['required', 'string'],
            'direccion' => ['nullable', 'string'],
            'direccion_numero' => ['nullable', 'integer'],
            'direccion_opcional' => ['nullable', 'string'],
            'foto' => ['nullable', 'image'],
            'rol' => ['required', 'integer', 'min:1', 'max:3'],
            'estado' => ['required', 'integer', 'min:1', 'max:3'],
            'calificacion' => ['nullable', 'string'],
            'clave_antigua' => ['nullable', 'string'],
            'borrado' => ['nullable', 'integer'],
            'comuna' => ['nullable', 'string'],
            'region' => ['nullable', 'string'],

        ];
    }
}
