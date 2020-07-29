<?php

use Illuminate\Database\Seeder;
use App\Item;
class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete();

        $item = Item::create([

            'nome'=>'Caneta',
            'descricao'=>'oluptates unde optio unde. Accusantium dolorem est est architecto impedit. Corrupti et provident quo.
            Reprehenderit dolores aut quidem suscipit repudiandae ',
            'id_categoria'=>4,

        ]);
        $item = Item::create([

            'nome'=>'Papel A4',
            'descricao'=>'oluptates unde optio unde. Accusantium dolorem est est architecto impedit. Corrupti et provident quo.
            Reprehenderit dolores aut quidem suscipit repudiandae ',
            'id_categoria'=>4,

        ]);
        $item = Item::create([

            'nome'=>'Exame Arritmologia',
            'descricao'=>'oluptates unde optio unde. Accusantium dolorem est est architecto impedit. Corrupti et provident quo.
            Reprehenderit dolores aut quidem suscipit repudiandae ',
            'id_categoria'=>5,

        ]);
        $item = Item::create([

            'nome'=>'Exame Eletrocardiograma',
            'descricao'=>'oluptates unde optio unde. Accusantium dolorem est est architecto impedit. Corrupti et provident quo.
            Reprehenderit dolores aut quidem suscipit repudiandae ',
            'id_categoria'=>6,

        ]);
        $item = Item::create([

            'nome'=>'Hemograma',
            'descricao'=>'oluptates unde optio unde. Accusantium dolorem est est architecto impedit. Corrupti et provident quo.
            Reprehenderit dolores aut quidem suscipit repudiandae ',
            'id_categoria'=>6,

        ]);

        $item = Item::create([

            'nome'=>'HIV',
            'descricao'=>'oluptates unde optio unde. Accusantium dolorem est est architecto impedit. Corrupti et provident quo.
            Reprehenderit dolores aut quidem suscipit repudiandae ',
            'id_categoria'=>6,

        ]);
        $item = Item::create([

            'nome'=>'Faxina geral',
            'descricao'=>'oluptates unde optio unde. Accusantium dolorem est est architecto impedit. Corrupti et provident quo.
            Reprehenderit dolores aut quidem suscipit repudiandae ',
            'id_categoria'=> 8,

        ]);
        $item = Item::create([

            'nome'=>'papel Toalha',
            'descricao'=>'oluptates unde optio unde. Accusantium dolorem est est architecto impedit. Corrupti et provident quo.
            Reprehenderit dolores aut quidem suscipit repudiandae ',
            'id_categoria'=>8,

        ]);




    }
}
