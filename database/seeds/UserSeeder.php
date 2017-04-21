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
        $u->name = 'Alisson';
        $u->email = 'alisson@gmail.com';
        $u->cpf = '00000000000';
        $u->role = 'admin';
        $u->password = bcrypt('123456');
        $u->save();
    }

}
