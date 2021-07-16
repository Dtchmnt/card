@extends('layouts.admin_layout')

@section('title', 'Редактирование пользователя')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование пользователя: {{ $users['name'] }}</h1>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Редактирование</h3>
                        </div>
                        <!-- form start -->
                        <form action="{{ route('users.update', $users['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Имя, Фамилия"
                                           required maxlength="255" value="{{ old('name') ?? $users->name ?? '' }}">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="change_password"
                                           id="change_password">
                                    <label class="form-check-label" for="change_password">
                                        Изменить пароль пользователя
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input  type="password" class="form-control" name="password" maxlength="255"
                                           placeholder="Новый пароль" value="">
                                </div>
                                <div class="form-group">
                                    <input  type="password" class="form-control" name="password_confirmation" maxlength="255"
                                           placeholder="Пароль еще раз" value="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
