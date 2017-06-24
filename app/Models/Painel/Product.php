<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Lista branca é um fillable.
     * Um array com todos os campos que podem ser preenchido pelo usuário.
     */
	protected $fillable = ['name', 'number', 'active', 'category', 'description'];
	
	/**
	 * Lista negra é um guarded.
	 * Quais campos não podem ser preenchidos.
	 */
// 	protected $guarded = ['admin'];//coluna que não quero que seja preenchida
	
	/**
	 * Validação dos dados do formulário.
	 * @var array
	 */
	public $rules = [
			'name' 		  => 'required|min:3|max:100',
			'number' 	  => 'required|numeric',
			'category' 	  => 'required',
			'description' => 'min:3|max:1000' //Significa que não é obrigado colocar valor 
											  // mas se colocar, deve ser no mínimo 3 caracteres.
	];
	
	/**
	 * Mensagens de erros do formulário.
	 * @var array
	 */
	public $messages = [
			//'required' => 'Para todos os campos requeridos',
			'name.required' => 'Campo nome é obrigatório!',
			'name.min' => 'Campo nome deve ter no mínimo 3 caracteres.',
			'name.max' => 'Campo nome deve ter no máximo 100 caracteres.',
			'number.required' => 'Campo ativo é obrigatório!',
			'number.numeric' => 'Campo ativo deve ser númerico.',
			'category.required' => 'Selecione uma categoria válida!',
	];
	
}
