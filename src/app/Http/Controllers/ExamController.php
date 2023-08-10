<?php

namespace App\Http\Controllers;

use App\Models\ExamYear;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index ()
    {
        $exam_years = new ExamYear();

        return view('exams.index')->with(['exam_years' => $exam_years->get()]);
    }

    public function show (ExamYear $exam_year)
    {
        $exams = $exam_year->exams()->get();

        return view('exams.show')->with(['exams' => $exams, 'exam_year' => $exam_year]);
    }

    public function store (Request $request, ExamYear $exam_year)
    {
        $exams = $exam_year->exams()->get();
        
        foreach ($request->inputs as $exam_id => $input) {
            // 全角 -> 半角
            $input_format = mb_convert_kana($input, "rnas");
            // 正誤判定
            $is_correct = $input_format == $exams->find($exam_id)->answer ? true : false;
            // resultsテーブルに保存
            Result::updateOrCreate([
                'exam_id' => $exam_id,
                'user_id' => Auth::id(),
                'input' => $input,
                'is_correct' => $is_correct,
            ]);
        }

        return redirect()->route('exam.answer', ['exam_year' => $exam_year]);
    }

    public function answer (ExamYear $exam_year)
    {
        $exams = $exam_year->exams()->get();

        $results = [];
        foreach ($exam_year->exams()->get() as $exam) {
            array_push($results, $exam->results()->where('user_id', Auth::id())->first());
        }

        return view('exams.answer')->with(['exam_year' => $exam_year, 'results' => $results]);
    }
}
