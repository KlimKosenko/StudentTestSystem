@extends('layout')
@section('title',"Create question")
@section('content')
    <div class="container">
        <h1>Додавання питання до тесту: {{ $test->title }}</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('questions.store', $test->test_id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="question_text" class="form-label">Текст питання</label>
                <input type="text" class="form-control" id="question_text" name="question_text" value="{{ old('question_text') }}" required>
                @error('question_text')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="question_type" class="form-label">Тип питання</label>
                <select class="form-control" id="question_type" name="question_type" required>
                    <option value="single_choice" {{ old('question_type') == 'single_choice' ? 'selected' : '' }}>Одна відповідь</option>
                    <option value="multiple_choice" {{ old('question_type') == 'multiple_choice' ? 'selected' : '' }}>Багато відповідей</option>
                    <option value="open" {{ old('question_type') == 'open' ? 'selected' : '' }}>Відкрита відповідь</option>
                </select>
                @error('question_type')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3" id="answers-container">
                <label class="form-label">Варіанти відповідей</label>
                <div id="answers">
                    <div class="answer mb-2">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="answers[0][answer_text]" placeholder="Текст відповіді">
                            <div class="form-check mt-1 ms-2">
                                <input class="form-check-input" type="checkbox" name="answers[0][is_correct]" value="1">
                                <label class="form-check-label">Правильна відповідь</label>
                            </div>
                            <button type="button" class="btn btn-danger btn-remove-answer ms-2">Видалити</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary mt-2" id="addAnswer">Додати відповідь</button>
            </div>
            <button type="submit" class="btn btn-primary">Створити питання</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let answerIndex = 1;

            document.getElementById('addAnswer').addEventListener('click', function () {
                const answerContainer = document.createElement('div');
                answerContainer.classList.add('answer', 'mb-2');
                answerContainer.innerHTML = `
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="answers[${answerIndex}][answer_text]" placeholder="Текст відповіді">
                    <div class="form-check mt-1 ms-2">
                        <input class="form-check-input" type="checkbox" name="answers[${answerIndex}][is_correct]" value="1">
                        <label class="form-check-label">Правильна відповідь</label>
                    </div>
                    <button type="button" class="btn btn-danger btn-remove-answer ms-2">Видалити</button>
                </div>
            `;
                document.getElementById('answers').appendChild(answerContainer);
                answerIndex++;
            });

            document.getElementById('answers').addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('btn-remove-answer')) {
                    e.target.closest('.answer').remove();
                }
            });

            document.getElementById('question_type').addEventListener('change', function () {
                const questionType = this.value;
                const answersContainer = document.getElementById('answers-container');
                if (questionType === 'open') {
                    answersContainer.style.display = 'none';
                } else {
                    answersContainer.style.display = 'block';
                }
            });

            document.getElementById('question_type').dispatchEvent(new Event('change'));
        });
    </script>
@endsection
