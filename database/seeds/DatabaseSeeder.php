<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        App\User::create([
            'name' => 'Admin Instrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            // 'phone' => '123456789',
        ]);

        App\User::create([
            'name' => 'PruebaUser',
            'email' => 'prueba@gmail.com',
            'password' => bcrypt('prueba12'),
            'role' => 'user',
            'account_id' => '1',
            // 'phone' => '123456789',
        ]);
    }
}
