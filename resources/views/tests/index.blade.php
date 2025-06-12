@extends('layout')
@section('title',"Tests")
@section('content')
    <div class="container">
        <h1>Список тестів</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('tests.create') }}" class="btn btn-primary mb-3">Додати тест</a>
        @if(Auth::user()->role === "admin")
            <a href="{{ route('adminPage') }}" class="btn btn-secondary mb-3">Повернутися на головну</a>
        @elseif(Auth::user()->role === "teacher")
        <a href="{{ route('teacherPage') }}" class="btn btn-secondary mb-3">Повернутися на головну</a>
        @endif


        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Назва</th>
                <th>Предмет</th>
                <th>Час початку</th>
                <th>Час завершення</th>
                <th>Тривалість (хв)</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tests as $test)
                <tr>
                    <td>{{ $test->test_id }}</td>
                    <td>{{ $test->title }}</td>
                    <td>{{ $test->subject }}</td>
                    <td>{{ $test->start_time }}</td>
                    <td>{{ $test->end_time }}</td>
                    <td>{{ $test->duration }}</td>
                    <td>
                        <a href="{{ route('questions.create', $test->test_id) }}" class="btn btn-success">Додати питання</a>
                        <a href="{{ route('tests.edit', $test->test_id) }}" class="btn btn-warning">Редагувати</a>
                        <form action="{{ route('tests.destroy', $test->test_id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
