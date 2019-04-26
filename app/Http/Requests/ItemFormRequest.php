<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemFormRequest extends FormRequest
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
            'modelo'=>'required|max:100',        
            'numSerie'=>'max:50',
            'numTombo'=>'max:50',
            'observacoes'=>'max:150',
            'idTipo'=>'required',
            'idFabricante'=>'required',
            'idSituacao'=>'required'
        ];
    }
}
