<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * O comando dentro do método run() irá executa a classe UserTableSeeder e, consequentemente, 
     * fará o registro no banco de dados.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);//faz o registro do usuário.
    }
}
