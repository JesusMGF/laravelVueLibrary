<?php

use Illuminate\Database\Seeder;
use App\Categorie;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Categorie::truncate();

        $categorie = new Categorie();
        $categorie->name = 'Adventure';
        $categorie->save();

        $categorie = new Categorie();
        $categorie->name = 'Sci-Fi';
        $categorie->save();

        $categorie = new Categorie();
        $categorie->name = 'Drama';
        $categorie->save();

        $categorie = new Categorie();
        $categorie->name = 'Comedy';
        $categorie->save();

        $categorie = new Categorie();
        $categorie->name = 'Thriller';
        $categorie->save();
    }
}
