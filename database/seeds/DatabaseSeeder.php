<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class)->create([
            'name' => 'Allan Roberto',
            'email' => 'allanroberto18@gmail.com',
            'password' => bcrypt('kerberos280104')
        ]);

        factory(\App\Models\User::class)->create([
            'name' => 'Odair Ferreira Duarte',
            'email' => 'odair@siedsistemas.com.br',
            'password' => bcrypt('842578842578')
        ]);

        factory(\App\Models\Config::class)->create();

        $this->call(SobreNosTableSeeder::class);
        $this->call(PaginaTableSeeder::class);
    }
}
