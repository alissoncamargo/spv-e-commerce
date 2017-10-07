<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $u = new Shoppvel\User();
        $u->name = 'Adiministrador';
        $u->email = 'admin@admin.com';
        $u->cpf = '00000000000';
        $u->role = 'admin';
        $u->password = bcrypt('123456');
        $u->save();
        $u = new Shoppvel\User();
        $u->name = 'Cozinha';
        $u->email = 'cozinha@cozinha.com';
        $u->cpf = '00000000000';
        $u->role = 'cozinha';
        $u->password = bcrypt('123456');
        $u->save();
    }
    /*public function run(){
        $u = new lanchonete\User();
        $u->name = 'Cozinha';
        $u->email = 'cozinha@cozinha.com';
        $u->cpf = '00000000000';
        $u->role = 'cozinha';
        $u->password = bcrypt('123456');
        $u->save();
    }*/

}