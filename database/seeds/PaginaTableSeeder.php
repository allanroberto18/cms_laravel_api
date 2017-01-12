<?php

use Illuminate\Database\Seeder;

class PaginaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pagina = factory(\App\Models\Pagina::class)->create();

        factory(\App\Models\Menu::class)->create([
            'nome' => 'Home',
            'link' => '/'
        ]);

        factory(\App\Models\PaginaCaracteristica::class, 9)->create([
            'pagina_id' => $pagina->id
        ]);

        factory(\App\Models\Banner::class)->create([
            'pagina_id' => $pagina->id
        ]);

        factory(\App\Models\PaginaVideo::class)->create([
            'pagina_id' => $pagina->id
        ]);

        factory(\App\Models\PaginaProduto::class, 1)->create([
            'pagina_id' => $pagina->id,
            'destaque' => 1
        ]);

        factory(\App\Models\PaginaCliente::class, 20)->create([
            'pagina_id' => $pagina->id
        ]);

        factory(\App\Models\PaginaProduto::class, 3)->create([
            'pagina_id' => $pagina->id
        ]);

        factory(\App\Models\Noticia::class, 20)->create();
    }
}
