<?php

use Illuminate\Database\Seeder;

class ContatoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\FaleConoscoAssunto::class)->create([
            'titulo' => 'Diretoria',
            'email' => 'odair@siedsistemas.com.br'
        ]);

        factory(\App\Models\FaleConoscoAssunto::class)->create([
            'titulo' => 'Vendas',
            'email' => 'vendas@siedsistemas.com.br'
        ]);

        factory(\App\Models\FaleConoscoAssunto::class)->create([
            'titulo' => 'Suporte',
            'email' => 'paulo@siedsistemas.com.br'
        ]);

        factory(\App\Models\FaleConosco::class, 10)->create([
            'fale_conosco_assunto_id' => random_int(1,3),
        ]);
    }
}
