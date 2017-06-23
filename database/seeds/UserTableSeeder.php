<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Para criar esta classe, uso o comando: php artisan make:seeder UserTableSeeder
     * 'App' é namespace do arquivo User.php dentro de app.
     * O usuário só será registro quando for chamado dentro da classe DatabaseSeeder.
     * 
     * @return void
     */
    public function run()
    {
        # Criar o primeiro usuário.
        App\User::create([
        		'name' => 'admin',
        		'email' => 'admin@gmail.com',
        		'password' => bcrypt('123')
        ]);
    }
}
