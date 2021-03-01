<?php

use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = new Outlet;
        $init->name = "contoh";
        $init->address = "Bumiharjo RT 01 RW 01";
        $init->phone_number = "088228740010";
        $init->save();
    }
}
