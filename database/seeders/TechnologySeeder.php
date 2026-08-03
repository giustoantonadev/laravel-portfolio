<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        $technologies = [
            [
                'name' => 'PHP',
                'category' => 'backend',
                'color' => '#8993be',
                'icon' => 'fa-brands fa-php',
            ],
            [
                'name' => 'Laravel',
                'category' => 'backend',
                'color' => '#ff2d20',
                'icon' => 'fa-brands fa-laravel',
            ],
            [
                'name' => 'Node.js',
                'category' => 'backend',
                'color' => '#3c873a',
                'icon' => 'fa-brands fa-node',
            ],
            [
                'name' => 'MySQL',
                'category' => 'database',
                'color' => '#00758f',
                'icon' => 'fa-solid fa-database',
            ],
            [
                'name' => 'PostgreSQL',
                'category' => 'database',
                'color' => '#336791',
                'icon' => 'fa-solid fa-database',
            ],
            [
                'name' => 'JavaScript',
                'category' => 'frontend',
                'color' => '#f7df1e',
                'icon' => 'fa-brands fa-js',
            ],
            [
                'name' => 'Vue',
                'category' => 'frontend',
                'color' => '#42b883',
                'icon' => 'fa-brands fa-vuejs',
            ],
            [
                'name' => 'React',
                'category' => 'frontend',
                'color' => '#61dafb',
                'icon' => 'fa-brands fa-react',
            ],
            [
                'name' => 'HTML',
                'category' => 'frontend',
                'color' => '#e34c26',
                'icon' => 'fa-brands fa-html5',
            ],
            [
                'name' => 'CSS',
                'category' => 'frontend',
                'color' => '#264de4',
                'icon' => 'fa-brands fa-css3-alt',
            ],
            [
                'name' => 'Tailwind',
                'category' => 'frontend',
                'color' => '#38bdf8',
                'icon' => 'fa-solid fa-wind',
            ],
            [
                'name' => 'Flutter',
                'category' => 'mobile',
                'color' => '#02569b',
                'icon' => 'fa-brands fa-flutter',
            ],
            [
                'name' => 'React Native',
                'category' => 'mobile',
                'color' => '#61dafb',
                'icon' => 'fa-brands fa-react',
            ],
            [
                'name' => 'Docker',
                'category' => 'devops',
                'color' => '#0db7ed',
                'icon' => 'fa-brands fa-docker',
            ],
            [
                'name' => 'Git',
                'category' => 'devops',
                'color' => '#f34f29',
                'icon' => 'fa-brands fa-git-alt',
            ],
        ];

        foreach ($technologies as $tech) {
            Technology::create([
                'name' => $tech['name'],
                'slug' => Str::slug($tech['name']),
                'category' => $tech['category'],
                'color' => $tech['color'],
                'icon' => $tech['icon'],
            ]);
        }
    }
}
