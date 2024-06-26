<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            ['field'=>'[
                {
                    "label": "Sangat Tidak Puas",
                    "value": 1
                },
                {
                    "label": "Tidak Puas",
                    "value": 2
                },
                {
                    "label": "Cukup Puas",
                    "value": 3
                },
                {
                    "label": "Puas",
                    "value": 4
                },
                {
                    "label": "Sangat Puas",
                    "value": 5
                }
            ]'],
        ];

        Answer::insert($collections);
    }
}
