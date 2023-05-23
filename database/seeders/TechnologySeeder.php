<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tech=['Laravel','Bootstrap','VueJs','React','Angular','tailwind'];
        foreach ($tech as $item) {
            $tmp=new Technology();
            $tmp->name=$item;
            $tmp->save();
        }
    }
}
