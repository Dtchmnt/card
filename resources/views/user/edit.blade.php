@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-lg-6 card card-body mx-auto">
                    <form method="POST" action="{{ route('user.edit') }}"
                          class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="alert">
                                            <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                                        </div>
                                    @endif
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div><br />
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" maxlength="255"
                                       placeholder="Новый пароль" value="">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation"
                                       maxlength="255"
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
@endsection
