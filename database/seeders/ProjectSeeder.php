<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        Schema::enableForeignKeyConstraints();

        $language=['php','javascript','c++','java','python'];
        for($i=0;$i<10;$i++){
            $tmp=new Project();
            $tmp->title=$faker->sentence(3);
            $tmp->description=$faker->paragraph();
            $tmp->language=$faker->randomElement($language).", ".$faker->randomElement($language);
            $tipo=new Type();
            $tmp->type_id=$tipo->inRandomOrder()->first()->id;
            $tmp->slug=Str::slug($tmp->title);
            $tmp->save();
        }
    }
}
