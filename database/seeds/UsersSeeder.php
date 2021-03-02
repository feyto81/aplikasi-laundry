<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = new User;
        $init->name = "feyto";
        $init->username = "admin";
        $init->email = "admin@gmail.com";
        $init->password = Hash::make("123456");
        $init->photo = "NULL";
        $init->outlet_id = "1";
        $init->level_id = "1";
        $init->status = "1";
        $init->save();
    }
}
