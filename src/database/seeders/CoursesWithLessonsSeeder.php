<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Course;
use Database\Factories\LessonFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesWithLessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory(10)
            ->has(Lesson::factory(10))
            ->create();
    }
}
