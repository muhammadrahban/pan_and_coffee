<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'title'     => 'Almond Almerreto',
                'image'     => 'assets/item_images/Almond Amaretto Concha.jpg',
                'size'      => '.35',
                'price'     => '5',
            ],
            [
                'title'     => 'Pistaccio Concha',
                'image'     => 'assets/item_images/Pistachio Concha.jpg',
                'size'      => '.35',
                'price'     => '5',
            ],
            [
                'title'     => 'Fudge chocalate',
                'image'     => 'assets/item_images/Fudge Chocolate.jpg',
                'size'      => '.35',
                'price'     => '5.50',
            ],
            [
                'title'     => 'Sweet corn bread',
                'image'     => 'assets/item_images/Sweet Corn.jpg',
                'size'      => '.56',
                'price'     => '5',
            ],
            [
                'title'     => 'Chai palmier',
                'image'     => 'assets/item_images/Chai Palmier.jpg',
                'size'      => '.29',
                'price'     => '3.75',
            ],
            // [
            //     'title'     => 'Salted chocalate',
            //     'image'     => 'assets/item_images/Almond Amaretto Concha.jpg',
            //     'size'      => '.30',
            //     'price'     => '5',
            // ],
            [
                'title'     => 'pecan muffin',
                'image'     => 'assets/item_images/Pecan Muffin.jpg',
                'size'      => '.30',
                'price'     => '5',
            ],
            [
                'title'     => 'momkey bread',
                'image'     => 'assets/item_images/Monkey Bread.jpg',
                'size'      => '.30',
                'price'     => '4.50',
            ],
            [
                'title'     => 'Pumpkin creame cheese muffin',
                'image'     => 'assets/item_images/Pumpkin Muffin.jpg',
                'size'      => '.38',
                'price'     => '3.50',
            ],
            [
                'title'     => 'Nutepla',
                'image'     => 'assets/item_images/Nutella Croissant.jpg',
                'size'      => '.35',
                'price'     => '5.50',
            ],
            [
                'title'     => 'expresso croissant',
                'image'     => 'assets/item_images/Espresso Croissant.jpg',
                'size'      => '.35',
                'price'     => '5.50',
            ],
        ]);
    }
}
