<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function create()
    {
        return view('tests.create');
    }

    public function index()
    {
        $tests = Test::all();
        return view('tests.index', compact('tests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'duration' => 'required|integer|min:1',
        ]);

        Test::create([
            'title' => $request->title,
            'subject' => $request->subject,
            'teacher_id' => auth()->id(),  // Припускаємо, що ID викладача - це ID поточного користувача
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'duration' => $request->duration,
        ]);

        return redirect()->route('tests.create')->with('success', 'Тест створено успішно');
    }
    public function edit(Test $test)
    {
        return view('tests.edit', compact('test'));
    }

    public function update(Request $request, Test $test)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'duration' => 'required|integer|min:1',
        ]);

        $test->update($request->all());

        return redirect()->route('tests.index')->with('success', 'Тест оновлено успішно');
    }

    public function destroy(Test $test)
    {
        $test->delete();
        return redirect()->route('tests.index')->with('success', 'Тест видалено успішно');
    }
}
