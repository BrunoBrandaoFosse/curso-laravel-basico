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
	
}
