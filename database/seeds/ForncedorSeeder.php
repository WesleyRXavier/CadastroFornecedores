<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
class ForncedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fornecedores')->delete();

        $fornecedor = Fornecedor::create([

            'nome'=>'Magazine Luiza',
            'cnpj'=>'1111111111111111',
            'status'=>1,

        ]);

        $fornecedor = Fornecedor::create([

            'nome'=>'Americanas',
            'cnpj'=>'22222222222222222',
            'status'=>1,

        ]);

        $fornecedor = Fornecedor::create([

            'nome'=>'Carrefour',
            'cnpj'=>'3333333333333333',
            'status'=>1,

        ]);

        $fornecedor = Fornecedor::create([

            'nome'=>'Laboratorio Pretti',
            'cnpj'=>'4444444444444444444',
            'status'=>1,

        ]);
        $fornecedor = Fornecedor::create([

            'nome'=>'Service Limp',
            'cnpj'=>'555555555555555',
            'status'=>1,

        ]);

        $fornecedor = Fornecedor::create([

            'nome'=>'DNALab Laboratorio',
            'cnpj'=>'6666666666666666666',
            'status'=>1,

        ]);

        $fornecedor = Fornecedor::create([

            'nome'=>'Fenix Materias',
            'cnpj'=>'777777777777777777',
            'status'=>0,

        ]);










    }
}
