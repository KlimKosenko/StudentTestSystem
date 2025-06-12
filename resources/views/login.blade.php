@extends('layout')
@section('title', 'Логін')
@section('content')
    <div class="container mt-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h3 class="text-center">Увійдіть в систему тестування</h3>
                    </div>
                    <div class="card-body">
                        <p class="lead text-center mb-4">Вітаємо. Будь ласка увійдіть в обліковий запис.</p>
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
                        <form action="{{route('login.post')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Логін</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Введіть логін">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Пароль</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Введіть пароль">
                            </div>
                            <button type="submit" class="btn btn-dark btn-block">Увійти</button>
                            <div class="text-center mt-1">
                                <p>Якщо немає облікового запису <a href="/registration" class="link-primary">Зареєструйтесь</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
