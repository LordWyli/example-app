<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_usuario' => 'required|max:6|min:6',
            'nombre' => 'required|max:15',
            'prim_apellido' => 'required|max:25',
            'seg_apellido' => 'required|max:25',
            'clave_acceso' => 'required|min:8',
            'fecha_registro' => 'required|date',
            'id_area' => 'required|max:2|min:1',
            'id_rol' => 'required|max:2|min:1',
            'estado' => 'required|max:2|min:1'
        ];
    }
}
