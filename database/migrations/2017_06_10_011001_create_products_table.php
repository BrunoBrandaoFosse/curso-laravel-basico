<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('products', function (Blueprint $table) {
    		$table->increments('id');
    		//por default é 255 caracteres, mas, eu estou definindo no máximo 150 caracteres.
    		$table->string('name', 150);
    		$table->integer('number');
    		$table->boolean('active');
    		$table->string('image', 200)->nullable();//pode ser nulo.
    		$table->enum('category', ['eletronicos', 'moveis', 'limpeza', 'banho']);
    		$table->text('description');
    		$table->timestamps();//cria created_at e updated_at.
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
