<?php

namespace Database\Seeders;

use App\Models\Maker;
use App\Models\Model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelsSeeder extends Seeder
{

    
    const ITEMS = [
        'BMW'=>['M3','i3'],
        'Audi'=>['A4','Q3'],
        'Mercedes'=>['S-class','C-class'],
        'Ford'=>['Focus','Fiesta'],
        'Volvo'=>['S40','XC60'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ITEMS as $key => $makers) {
            foreach ($makers as $item) {
                $maker = Maker::where(['name' => $key]);
                $model = new Model();
                $model->maker_id=$maker->id;
                $model->name=$item;
            }
        }
        

    }
}
