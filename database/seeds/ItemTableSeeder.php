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
        $item->name = 'Spider-man';
        $item->description = 'Spider-man';
        $item->categorie_id = 1;
        $item->save();

        $item = new Item();
        $item->name = 'Die Hard';
        $item->description = 'Die Hard';
        $item->categorie_id = 1;
        $item->save();

        $item = new Item();
        $item->name = 'Home Alone';
        $item->description = 'Home Alone';
        $item->categorie_id = 4;
        $item->save();

        $item = new Item();
        $item->name = 'There’s something about Mary';
        $item->description = 'There’s something about Mary';
        $item->categorie_id = 4;
        $item->save();
    }
}
