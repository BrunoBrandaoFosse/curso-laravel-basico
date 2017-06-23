<?php

namespace App\Http\Controllers\Site;//Tive que adicionar '\Site' no meu namespace devido a pasta.

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
	public function __construct() {
// 		$this->middleware('auth'); // Outra forma de usar middleware para autenticação.

		// Para falar os métodos que vão passar pela autenticação.
		
// 		$this->middleware('auth')->only(['contato', 'categoriaOpcional']);
// 		$this->middleware('auth')->except(['index', 'categoria']);// Exceção, não precisa de autenticação
		
	}
	
    public function index() 
    {
    	$titulo = 'Página Inicial';
    	$mensagem = 'View Teste';
    	//Outra forma de fazer, mais compacta.
//     	return view('teste', compact($titulo, $mensagem));
		
    	$senha = '123';//testar if
    	$arrayData = [1,2,3,4,5,6,7,8,9];//testar foreach
    	$arrayDataVazio = [];
    	
    	//site.teste = pasta.arquivo, porque a view teste.blade.php está dentro da pasta site.
    	return view('site.home.index', [
    			'mensagem' => $mensagem, 
    			'titulo' => $titulo,
    			'senha' => $senha,
    			'dados' => $arrayData,
    			'dadosVazio' => $arrayDataVazio
    	]);
    }
	
    public function contato() 
    {
    	$titulo = 'Contato';
    	$mensagem = 'Pág. Contato';
    	return view('site.contato.index', compact('titulo', 'mensagem'));
    }
    
    public function categoria($id) {
    	return "Listagem dos posts da categoria: {$id}";
    }
    
    public function categoriaOpcional($id = null) {
    	if (!is_null($id)) {
    		return "Listagem dos posts da categoria: {$id}";
    	} else {
    		return "<p style='font-size:18px;color:red;'>Categoria sem ID.</p>";
    	}
    }
    
    public function login() {
    	return "<span style='font:36px Arial;color:#333;'>".
				"Página de <strong>LOGIN</strong></span>";
    }
    
}
