@extends('layout')
@section('title','Реєстрація')
@section('content')
    <div class="container mt-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h3 class="text-center">Реєстрація в системі тестування</h3>
                    </div>
                    <div class="card-body">
                        <p class="lead text-center mb-4">Створіть свій обліковий запис.</p>
                        <div class="mt-5">
                            @if($errors->any())
                                <div class="col-12">
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            @endif

                            @if(session()->has('error'))
                                    <div class="alert alert-danger">{{session('error')}}</div>
                                @endif
                            @if(session()->has('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                        </div>
                        <form action="{{route('registration.post')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Логін</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Введіть логін">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Пароль</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Введіть пароль">
                            </div>
                            <div class="mb-3">
                                <label for="surname" class="form-label">ПІБ</label>
                                <input type="text" name ="surname" class="form-control" id="surname" placeholder="Введіть ПІБ">
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Роль</label>
                                <select class="form-select" name="role" id="role">
                                    <option value="student">Студент</option>
                                    <option value="teacher">Викладач</option>
                                </select>
                            </div>
                            <div class="mb-3" id="groupDiv">
                                <label for="group" class="form-label">Група студентів</label>
                                <select class="form-select" name="student_group" id="group">
                                    <option value="ІПЗ-44мс">ІПЗ-44мс</option>
                                    <option value="ІПЗ-43">ІПЗ-43</option>
                                    <option value="ІПЗ-42">ІПЗ-42</option>
                                    <option value="ІПЗ-41">ІПЗ-41</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-dark btn-block">Зареєструватися</button>
                            <div class="text-center mt-1">
                                <p>Вже маєте обліковий запис? <a href="/login" class="link-primary">Увійти</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
