@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row content-main0">
                <div class="col-lg-6 card card-body mx-auto">

                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab"
                               data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">Основные настройки</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab"
                               data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">Информация</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home"
                             role="tabpanel" aria-labelledby="home-tab">
                            <form method="POST" action="{{ route('user.edit') }}"
                                  class="needs-validation" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text"
                                                   name="name"
                                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   placeholder="Логин"
                                                   value="{{ Request::old('first_name') ?: Auth::user()->name }}">

                                            @if ( $errors->has('name') )
                                                <span class="invalid-feedback"> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="change_password"
                                           id="change_password">
                                    <label class="form-check-label" for="change_password">
                                        Изменить пароль пользователя
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="password" maxlength="255"
                                           placeholder="Новый пароль" value="">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="password_confirmation" maxlength="255"
                                           placeholder="Пароль еще раз" value="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
