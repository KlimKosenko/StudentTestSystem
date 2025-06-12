@extends('layout')
@section('title',"Edit Test")
@section('content')
    <div class="container">
        <h1>Редагування тесту</h1>

        <form action="{{ route('tests.update', $test->test_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Назва тесту</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $test->title) }}" required>
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Предмет</label>
                <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject', $test->subject) }}" required>
                @error('subject')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="start_time" class="form-label">Час початку</label>
                <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', $test->start_time) }}" required>
                @error('start_time')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="end_time" class="form-label">Час завершення</label>
                <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ old('end_time', $test->end_time) }}" required>
                @error('end_time')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Тривалість (хв)</label>
                <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration', $test->duration) }}" required>
                @error('duration')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Оновити тест</button>
            <a class="p-5" href="/tests"><button type="button" class="btn btn-secondary">Повернутися</button></a>
        </form>
    </div>
@endsection
