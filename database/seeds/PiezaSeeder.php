<?php

use App\Pieza;
use Illuminate\Database\Seeder;

class PiezaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $piezas = [
            ['pieza_numero' => '1.1'],['pieza_numero' => '1.2'],['pieza_numero' => '1.3'],['pieza_numero' => '1.4'],['pieza_numero' => '1.5'],['pieza_numero' => '1.6'],['pieza_numero' => '1.7'],['pieza_numero' => '1.8'],
            ['pieza_numero' => '2.1'],['pieza_numero' => '2.2'],['pieza_numero' => '2.3'],['pieza_numero' => '2.4'],['pieza_numero' => '2.5'],['pieza_numero' => '2.6'],['pieza_numero' => '2.7'],['pieza_numero' => '2.8'],
            ['pieza_numero' => '3.1'],['pieza_numero' => '3.2'],['pieza_numero' => '3.3'],['pieza_numero' => '3.4'],['pieza_numero' => '3.5'],['pieza_numero' => '3.6'],['pieza_numero' => '3.7'],['pieza_numero' => '3.8'],
            ['pieza_numero' => '4.1'],['pieza_numero' => '4.2'],['pieza_numero' => '4.3'],['pieza_numero' => '4.4'],['pieza_numero' => '4.5'],['pieza_numero' => '4.6'],['pieza_numero' => '4.7'],['pieza_numero' => '4.8']
        ];
        foreach ($piezas as $pieza){
            Pieza::updateOrCreate($pieza);
        }
    }
}
