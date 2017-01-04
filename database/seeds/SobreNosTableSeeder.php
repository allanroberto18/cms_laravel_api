<?php

use Illuminate\Database\Seeder;

class SobreNosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\SobreNos::class, 6)->create();
    }
}
