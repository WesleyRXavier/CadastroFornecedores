<?php

use Illuminate\Database\Seeder;
use App\Contato;
class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contatos')->delete();

        $fornecedor = Contato::create([

            'nome'=>'Luiza',
            'telefone'=>'1111111111111111',
            'celular'=>'1111111111111111',
            'status'=>1,
            'id_fornecedor'=>'1',

        ]);
        $fornecedor = Contato::create([

            'nome'=>'Americo',
            'telefone'=>'2222222222',
            'celular'=>'22222222222',
            'status'=>1,
            'id_fornecedor'=>'2',

        ]);
        $fornecedor = Contato::create([

            'nome'=>'Carlos',
            'telefone'=>'3333333333333',
            'celular'=>'3333333333333',
            'status'=>1,
            'id_fornecedor'=>'3',

        ]);
        $fornecedor = Contato::create([

            'nome'=>' Carlos Pretti',
            'telefone'=>'44444444444444',
            'celular'=>'44444444444444',
            'status'=>1,
            'id_fornecedor'=>'4',

        ]);
        $fornecedor = Contato::create([

            'nome'=>'Magali',
            'telefone'=>'555555555555',
            'celular'=>'555555555555',
            'status'=>1,
            'id_fornecedor'=>'5',

        ]);
        $fornecedor = Contato::create([

            'nome'=>'Roseane douglas',
            'telefone'=>'5465656',
            'celular'=>'656546546546',
            'status'=>1,
            'id_fornecedor'=>'5',

        ]);

        $fornecedor = Contato::create([

            'nome'=>'Luizane',
            'telefone'=>'45454545545',
            'celular'=>'544545454',
            'status'=>1,
            'id_fornecedor'=>'6',

        ]);
        $fornecedor = Contato::create([

            'nome'=>'Lidiane',
            'telefone'=>'45454545',
            'celular'=>'6568989898',
            'status'=>1,
            'id_fornecedor'=>'6',

        ]);
    }
}
