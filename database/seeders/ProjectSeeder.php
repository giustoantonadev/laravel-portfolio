<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Personal Portfolio Website',
                'description' => 'A modern personal portfolio built with Laravel and Tailwind CSS.',
                'type_id' => 1,
            ],
            [
                'title' => 'E-commerce Platform',
                'description' => 'A full-featured e-commerce application with product management and checkout.',
                'type_id' => 5,
            ],
            [
                'title' => 'Task Management Web App',
                'description' => 'A Trello-like task manager with drag-and-drop features.',
                'type_id' => 4,
            ],
            [
                'title' => 'Restaurant Reservation System',
                'description' => 'A booking system for restaurants with admin dashboard.',
                'type_id' => 1,
            ],
            [
                'title' => 'Mobile Fitness Tracker',
                'description' => 'A cross-platform fitness app built with Flutter.',
                'type_id' => 2,
            ],
            [
                'title' => 'Real-time Chat Application',
                'description' => 'A real-time chat app using WebSockets and Node.js.',
                'type_id' => 3,
            ],
            [
                'title' => 'Blog CMS Platform',
                'description' => 'A content management system for blogging with markdown support.',
                'type_id' => 5,
            ],
            [
                'title' => 'Weather Forecast SPA',
                'description' => 'A single-page application that fetches weather data from an API.',
                'type_id' => 4,
            ],
            [
                'title' => 'Inventory Management System',
                'description' => 'A warehouse inventory system with reporting and analytics.',
                'type_id' => 1,
            ],
            [
                'title' => 'Online Learning Platform',
                'description' => 'A platform for online courses with video lessons and quizzes.',
                'type_id' => 5,
            ],
        ];

        foreach ($projects as $data) {

            $project = Project::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'description' => $data['description'],
                'type_id' => $data['type_id'],
            ]);

            // Assign realistic technologies based on type
            $techIds = $this->getTechnologiesForType($data['type_id']);

            $project->technologies()->attach($techIds);
        }
    }

    private function getTechnologiesForType($typeId)
    {
        switch ($typeId) {

            case 1: // Web App
                return Technology::whereIn('name', [
                    'Laravel', 'PHP', 'MySQL', 'JavaScript', 'HTML', 'CSS', 'Tailwind'
                ])->pluck('id');

            case 2: // Mobile App
                return Technology::whereIn('name', [
                    'Flutter', 'React Native', 'JavaScript'
                ])->pluck('id');

            case 3: // Backend Service
                return Technology::whereIn('name', [
                    'Node.js', 'PHP', 'Laravel', 'MySQL'
                ])->pluck('id');

            case 4: // Frontend SPA
                return Technology::whereIn('name', [
                    'Vue', 'React', 'JavaScript', 'Tailwind'
                ])->pluck('id');

            case 5: // Full‑Stack Project
                return Technology::whereIn('name', [
                    'Laravel', 'PHP', 'MySQL', 'Vue', 'React', 'JavaScript', 'Tailwind'
                ])->pluck('id');

            default:
                return Technology::inRandomOrder()->take(3)->pluck('id');
        }
    }
}
