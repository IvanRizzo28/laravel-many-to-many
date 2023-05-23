<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type=['Fronted','Backand','FullStack','DBA','AI'];
        for($i=0;$i<5;$i++){
            $tmp=new Type();
            $tmp->name=$type[$i];
            $tmp->slug=Str::slug($tmp->name);
            //$tmp->type_id=Project::inRandomOrder()->get();
            /*$a=Project::inRandomOrder()->get();
            dd($a[0]);*/
            $tmp->save();
        }
    }
}
