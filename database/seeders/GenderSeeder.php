<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender=new Gender();
        $gender->gender="Hombre";
        $gender->save();

        $gender2=new Gender();
        $gender2->gender="Mujer";
        $gender2->save();

        $gender3=new Gender();
        $gender3->gender="Otros";
        $gender3->save();
    }
}
