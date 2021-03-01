<?php

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = new Level;
        $init->name = "Administrator";
        $init->save();

        $init = new Level;
        $init->name = "Kasir";
        $init->save();

        $init = new Level;
        $init->name = "Owner";
        $init->save();
    }
}
