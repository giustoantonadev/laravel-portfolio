<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $types = [
            ['name' => 'Web Design'],
            ['name' => 'Graphic Design'],
            ['name' => 'Mobile App Development'],
            ['name' => 'Backend Development'],
            ['name' => 'Frontend Development'],
            ['name' => 'Full Stack Development'],
            ['name' => 'Data Science'],
            ['name' => 'Machine Learning'],
            ['name' => 'Game Development'],
        ];

        foreach ($types as $type) {
            Type::create(['name' => $type['name']]);
        }
    
    }
}
