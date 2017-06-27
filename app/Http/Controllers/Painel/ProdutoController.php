<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller
{
	private $product;
	
	/**
	 * 
	 * @param Product $product
	 */
	public function __construct(Product $product)
	{
		$this->product = $product;
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$titulo = 'Listagem dos Produtos';
    	//Pegar todos os dados da tabela
    	$products = $this->product->all();
    	return view('painel.products.index', compact('products', 'titulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$titulo = 'Cadastrar Novo Produto';
    	$categorias = ['eletronicos', 'moveis', 'limpeza', 'banho'];
    	return view('painel.products.create-edit', compact('titulo', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)//Mudei o tipo de parâmetro de Request para ProductFormRequest.
    {
    	// Pega todos os dados do formulário.
    	//dd($request->all());
    	
    	// Pega campos específicos do formulário.
    	//dd($request->only(['name', 'description']));
    	
    	// Pega todos os campos, exceto ...
    	//dd($request->except(['_token']));
    	
    	// Campo específico
    	//dd($request->input('name'));
    	
    	$dataForm = $request->all();
    	
    	//Caso campo active não estiver sido selecionado.
    	$dataForm['active'] = (isset($dataForm['active']) && !is_null($dataForm['active'])) ? 1 : 0;
    	
    	//Validação dos dados. O ideal é que a validação fique na Model
    	//$this->validate($request, $this->product->rules, $this->product->messages);
    	
    	//Outra forma de validar os dados do formulário.
    	//$validate = Validator::make($dataForm, $this->product->rules);
    	/*
    	$validate = validator($dataForm, $this->product->rules, $this->product->messages);
    	
    	if ($validate->fails()) {
    		return redirect()->back()->withErrors($validate)->withInput();
    	}*/
    	//withErros($args) retorna os erros.
    	//withInput() retorna os dados preenchidos.
    	
    	
    	
    	
    	$insert = $this->product->create($dataForm);
    	
    	if ($insert) {
    		return redirect()->route('produtos.index');
    	} else {
    		return redirect()->back();//Volta de onde veio
    	}
    	
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);
        
        $titulo = "Editar Produto: {$product->name}";
        
        $categorias = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        
        return view('painel.products.create-edit', compact('titulo', 'categorias', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
    	$dataForm = $request->all();
    	
    	$product = $this->product->find($id);
    	
    	$dataForm['active'] = (isset($dataForm['active']) && !is_null($dataForm['active'])) ? 1 : 0;
    	
    	$update = $product->update($dataForm);
    	
    	if ($update)
    		return redirect()->route('produtos.index');
    	else
    		return redirect()->route('produtos.edit', $id)->with(['errors' => 'Falha ao Editar']);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * DELETE
     * delete(), para excluir o item.
     * destroy(id), a diferença que já posso passar o id dentro do método.
     * destroy([id1, id2, id3])
     * 
     * UPDATE
     * find(id), retorna um item pelo id.
     * where(campo_tabela, valor_campo), retorna um item por através de um campo específico.
     * 
     * @return string
     */
    public function testes()
    {
    	//Deletar item pelo id.
    	//$produto = $this->product->find(1);
    	//$del = $produto->delete();
    	//$del = $this->product->destroy(9);
    	
    	$del = $this->product->where('number', '123')->delete();
    	
    	return ($del) ? 'Deletado com sucesso' : 'Falha ao deletar';
    	
    	// find(id), retorna um item pelo id.
    	// where(campo_tabela, valor_campo), retorna um item por através de um campo específico.
    	
    	if (false) { // Para testar o delete.
	    	$produto = $this->product->where('name', 'Shampoo')->update([
	    			'description' => 'Todos os tipos de cabelos'
	    	]);
	    	return ($produto) ? "Alterado com sucesso" : "Erro ao alterar";
    	}
    	/**
    	 * Método insert é ruim por questões de segurança.
    	 * 
    	 * Método create é o ideal porque nele você define os campos que deve ser preenchido.
    	 * Método create e update só pode ser usado por que eu defini o fillable na minha model Product.
    	 */
    	
    	/*
    	$insert = $this->product->create([
    			'name' => 'Macbook Pro',
    			'number' => 10,
    			'active' => true,
    			'category' => 'eletronicos',
    			'description' => 'Melhor notebook do mercado.'
    	]);
    	
    	if ($insert) {
    		return "Inserido com sucesso! Produto com id igual a {$insert->id}.";
    	} else {
    		return 'Erro ao inserir produto! Tente novamente.';
    	}*/
    	
    	// A melhor forma de atualizar os dados.
    	// Pega item com id = 2
    	//$produto = $this->product->find(2);
    	
    	// Altera os dados do item de id 2.
    	//$update = $produto->update([// Não preciso alterar todos os campos, é opcional.
    	//		'name' => 'iPhone SE',
    	//		'description' => 'Mais belo e sofisticado smartphone do mercado.'
    	//]);
    	
    	//return ($update) ? "Item alterado com sucesso!" : "Erro ao alterar conteúdo.";
    	
    	// Find(), retorna um item pelo id.
    	//$produto = $this->product->find(1);
    	
    	//dd() é um debug do laravel. Ele dá um dump e sequentemente dá um die e mata o processamento para baixo.
    	//dd($produto);
    	//dd($produto->name);
    	//dd($produto, $produto->description); //Pode ter vários argumentos.
    	
    	/**
    	 * Forma não muito produtiva
    	 *
    	$produto->name = "iMac";
    	$produto->number = 1;
    	$produto->active = true;
    	$produto->category = 'eletronicos';
    	$produto->description = 'Amazing computer for designers.';
    	$produto->save();
    	*/
    	
    	/**
    	 * Forma não muito produtivo.
    	 * 
    	$prod = $this->product;
    	$prod->name = 'iPhone 7';
    	$prod->number = 3999;
    	$prod->active = true;
    	$prod->category = 'eletronicos';
    	$prod->description = 'Mais nova versão do iPhone';
    	
    	$insert = $prod->save(); //Salva o produto e retorna true.
    	
    	if ($insert) {
    		return 'Inserido com sucesso!';
    	} else {
    		return 'Erro ao inserir produto! Tente novamente.';
    	}
    	**/
    }
    
}
