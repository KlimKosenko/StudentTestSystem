@extends('layout')
@section('title',"Admin Page")
@section('content')
    <div class="container-fluid flex-grow-1">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link link-primary active" aria-current="page" href="/adminPage">
                                <span data-feather="home"></span>
                                Головна сторінка
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-dark" href="/students">
                                <span data-feather="file-text"></span>
                                Мій профіль
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-dark" href="/tests">
                                <span data-feather="layers"></span>
                                Управління тестами
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-dark" href="/results">
                                <span data-feather="bar-chart-2"></span>
                                Результати
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-danger" href="/logout">
                                <span data-feather="log-out"></span>
                                Вийти з системи
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Вітаємо, {{auth()->user()->surname}}</h1>
                </div>
                <p></p>
            </main>
        </div>
    </div>
@endsection
