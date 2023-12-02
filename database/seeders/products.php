<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;
use App\Models\multiimg;
use Illuminate\Support\Str;


class products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        product::create([
            'id' => 1 , 'name' => 'rolex' , 'price' => 200, 'description' => '',
             'image' => '','is_item' => 'no', 'prod_uniqid' => '17010337346563b70634a2b',
             'date' => '1-12-2023',

        ]);
            

       /* multiimg::create([
            'id' => 4 , 'multiimg' => '1701034505.png,1696795522.png',
            'multiid' => '17011104616564e2bdc3682',
            'id' => 3 , 'multiimg' => '1701034505.png,1696795522.png',
            'multiid' => '1701034505e2bdc3682',
            
        ]);*/
    }
}
