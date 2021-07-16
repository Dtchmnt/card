@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            Личный кабинет
                        </h1>
                    </div>
                </div>
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
        <section class="content">
        @foreach($users as $user)
            <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none"></h3>
                                <form method="POST" action="{{ route('user.updateAvatar') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <img src="{{'/storage/'.$user['img']}}" class="img-fluid" alt="Product Image">
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Загрузить аватар</label><br>
                                        <input type="file" name="img" id="img">
                                        <button type="submit" class="btn btn-primary">Сохранить</button>
                                    </div>
                                </form>
                                <hr>
                                <div class="mt-6">
                                    <a class="btn btn-primary" href="{{ route('user.edit') }}">
                                        Изменить пароль
                                    </a>
                                    <a class="btn btn-primary" href="{{ route('user.media.edit') }}">
                                        Редактировать данные
                                    </a>
                                </div>
                                <hr>
                                <div class="row">
                                    <label for="">Ссылка</label>
                                    <a href="/card/{{$user['slug']}}">{{Request::root().'/card/'.$user['slug']}}</a>
                                </div>
                                <hr>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="my-3">{{$user['first_name']}} {{$user['last_name']}}</h3>
                                <p>{{$user['description']}} </p>
                                <hr>
                                <h4 class="mt-3">Почта:
                                    <small>{{$user['email']}}</small>
                                </h4>
                                <hr>
                                <h4 class="mt-3">Номер телефона:
                                    <small>{{$user['phone']}}</small>
                                </h4>
                                <hr>
                                <h4 class="mt-3">Телеграм:
                                    <small>{{$user['telegram']}}</small>
                                </h4>
                                <hr>
                                <h4 class="mt-3">WhatsUp:
                                    <small>{{$user['whats']}}</small>
                                </h4>
                                <hr>
                                <h4 class="mt-3">Viber:
                                    <small>{{$user['viber']}}</small>
                                </h4>
                                <hr>
                                <h4 class="mt-3">Facebook:
                                    <small>{{$user['facebook']}}</small>
                                </h4>
                                <hr>
                                <h4 class="mt-3">Instagram:
                                    <small>{{$user['instagram']}}</small>
                                </h4>
                                <hr>
                                <h4 class="mt-3">Linkedin:
                                    <small>{{$user['in']}}</small>
                                </h4>
                                <hr>
                                <h4 class="mt-3">vk:
                                    <small>{{$user['vk']}}</small>
                                </h4>
                                <hr>

                                <h4 class="mt-3">youtube:
                                    <small>{{$user['youtube']}}</small>
                                </h4>
                                <hr>
                                <h4 class="mt-3">twitter:
                                    <small>{{$user['twitter']}}</small>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
@endsection
