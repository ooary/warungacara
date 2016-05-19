<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::insert('insert into categories set category_name="lomba" ');
        DB::insert('insert into categories set category_name="seminar" ');
        DB::insert('insert into categories set category_name="promo" ');

        $this->command->info('Seeding Category Suksees');





    }
}
