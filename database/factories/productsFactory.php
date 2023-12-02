<?php

namespace Database\Factories;

use App\Models\product;

use Illuminate\Support\Str;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class productsFactory extends Factory
{
    
    protected $model = product::class;
     

    public function definition()
    {
        
            product::factory()->count(50)->create();

        
    }
}
