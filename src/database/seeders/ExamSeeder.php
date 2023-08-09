<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # 2022年 (https://resemom.jp/pages/public-highschool-exam/13tokyo/2022/math/question01.html)
        DB::table('exams')->insert([
            'exam_year_id' => 1,
            'question_number' => 1,
            'question_text' => '1 - 6^2 ÷ 9/2',
            'answer' => '-7',
            'explanation_text' => '単純な計算問題。',
        ]);
        DB::table('exams')->insert([
            'exam_year_id' => 2,
            'question_number' => 1,
            'question_text' => '(3a + b) / 4 - (a-7b) / 8',
            'answer' => '(5a + 9b) / 8',
            'explanation_text' => '分数の通分がポイント。',
        ]);
    }
}
