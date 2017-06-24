<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//Se eu colocar false ele não permite o usuário fazer alteração.
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        	'name' 		  => 'required|min:3|max:100',
        	'number' 	  => 'required|numeric',
        	'category' 	  => 'required',
        	'description' => 'min:3|max:1000' /*Significa que não é obrigado colocar valor
        											mas se colocar, deve ser no mínimo 3 caracteres.*/
        ];
    }
    
    /**
     * Precisei criar este método. É opcional.
     * {@inheritDoc}
     * @see \Illuminate\Foundation\Http\FormRequest::messages()
     */
    public function messages()
    {
    	return [
    			//'required' => 'Para todos os campos requeridos',
    			'name.required' => 'Campo nome é obrigatório!',
    			'name.min' => 'Campo nome deve ter no mínimo 3 caracteres.',
    			'name.max' => 'Campo nome deve ter no máximo 100 caracteres.',
    			'number.required' => 'Campo ativo é obrigatório!',
    			'number.numeric' => 'Campo ativo deve ser númerico.',
    			'category.required' => 'Selecione uma categoria válida!',
    	];
    }
}
