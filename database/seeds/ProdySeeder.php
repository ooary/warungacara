<?php

use Illuminate\Database\Seeder;

class ProdySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::insert('insert into prody set name="Teknik Energi" ');
        DB::insert('insert into prody set name="Teknik Mesin" ');

        $this->command->info('seeding prody sukses');


    }
}
