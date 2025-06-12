<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Test $test)
    {
        return view('questions.create', compact('test'));
    }

    public function store(Request $request, Test $test)
    {

        $request->validate([
            'question_text' => 'required',
            'question_type' => 'required',
        ]);
        $question = Question::create([
            'test_id' => $test->test_id,
            'question_text' => $request->question_text,
            'question_type' => $request->question_type,
        ]);
        if ($request->question_type !== 'open') {
            foreach ($request->answers as $answer) {
                Answer::create([
                    'question_id' => $question->question_id,
                    'answer_text' => $answer['answer_text'],
                    'is_correct' => isset($answer['is_correct'])?$answer['is_correct']:false,
                ]);
            }
        }

        return redirect()->route('questions.create', $test->test_id)->with('success', 'Питання створено успішно');
    }
}
