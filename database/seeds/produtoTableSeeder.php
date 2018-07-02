<?php

use Illuminate\Database\Seeder;
use App\dbProdutos;
use Faker\Factory as Faker;

class produtoTableSeeder extends Seeder
{
    
    public function run()
    {
        //Rodar e inserir dados fake no banco

        //DB::table('dbProdutos')->truncate();

        //Instanciar a faker
        $faker = Faker::create();

        //Criar um loop para inserir varios dados fakes

        for($i=0;$i<30;$i++) {
        	dbProdutos::create([

        			'codint'=>$faker->ean8(),
        			'ean'=>$faker->randomDigitNotNull(),
        			'nomeprod'=>$faker->word(),
        			'descricao'=>$faker->sentence(),
        			'codforn'=>$faker->ean8(),
        			//'precocusto'=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        			//'precovenda'=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        			'sessao'=>$faker->randomDigitNotNull(),
        			'quantidade'=>$faker->randomDigitNotNull(),
        			'status1'=>$faker->randomDigitNotNull()



        	]);
        }
    }
}
