<?php

use Illuminate\Database\Seeder;
use \App\Categoria;
class catgeoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->delete();

        $categoria = Categoria::create([

            'nome'=>'Material Escritorio',
            'descricao'=>'oluptates unde optio unde. Accusantium dolorem est est architecto impedit. Corrupti et provident quo.
            Reprehenderit dolores aut quidem suscipit repudiandae ',

        ]);

        $categoria = Categoria::create([

            'nome'=>'Cardiologia',
            'descricao'=>'oluptates unde optio unde. Accusantium dolorem est est architecto impedit. Corrupti et provident quo.
            Reprehenderit dolores aut quidem suscipit repudiandae ',

        ]);
        $categoria = Categoria::create([

            'nome'=>'Laboratorios',
            'descricao'=>'oluptates unde optio unde. Accusantium dolorem est est architecto impedit. Corrupti et provident quo.
            Reprehenderit dolores aut quidem suscipit repudiandae ',

        ]);
        $categoria = Categoria::create([

            'nome'=>'Ar Condicionado',
            'descricao'=>'oluptates unde optio unde. Accusantium dolorem est est architecto impedit. Corrupti et provident quo.
            Reprehenderit dolores aut quidem suscipit repudiandae ',

        ]);
        $categoria = Categoria::create([

            'nome'=>'Limpeza',
            'descricao'=>'oluptates unde optio unde. Accusantium dolorem est est architecto impedit. Corrupti et provident quo.
            Reprehenderit dolores aut quidem suscipit repudiandae ',

        ]);
    }
}
