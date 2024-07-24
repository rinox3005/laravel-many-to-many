<?php

namespace Database\Seeders;

use App\Models\Technology;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Technology::truncate();

        $technologies =
            ['HTML', 'CSS', 'JavaScript', 'Vue', 'Vite', 'Bootstrap', 'PHP', 'MySQL', 'SQL', 'Laravel', 'Axios', 'Tailwind', 'React'];

        foreach ($technologies as $technology) {

            $new_technology = new Technology();

            $new_technology->name = $technology;
            $new_technology->slug = Str::of($technology)->slug();

            $new_technology->save();
        }
        Schema::enableForeignKeyConstraints();
    }
}
