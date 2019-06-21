<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::truncate();

        $item = new Item();
        $item->name = 'Regreso al futuro';
        $item->description = 'Va de regresar del futuro';
        $item->categorie_id = 1;
        $item->save();

        $item = new Item();
        $item->name = 'Regreso al futuro II';
        $item->description = 'Va de regresar del futuro otra vez';
        $item->categorie_id = 1;
        $item->save();

    }
}
