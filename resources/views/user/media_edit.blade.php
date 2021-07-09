@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
    <!-- Подключение библиотеки jQuery -->
    <script src="/admin/plugins/jquery/jquery.min.js"></script>

    <script src="/admin/plugins/jquery/jquery.maskedinput.min.js"></script>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование пользователя: {{ $userMedia['first_name'] }}</h1>
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
                        <form method="POST" action="{{ route('user.media.edit') }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <img src="{{'/storage/'.$userMedia['img']}}" alt="" class="img-fluid">
                                            </div>
                                            <div class="form-group">
                                                <label for="img">Загрузить аватар</label><br>
                                                <input type="file" name="img" id="img">
                                            </div>
                                            <div class="form-group">
                                                <label for="first_name">Имя</label>
                                                <input type="text" class="form-control" name="first_name"
                                                       placeholder="Имя"
                                                       required maxlength="255"
                                                       value="{{ old('first_name') ?? $userMedia->first_name ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name">Фамилия</label>
                                                <input type="text" class="form-control" name="last_name"
                                                       placeholder="Фамилия"
                                                       required maxlength="255"
                                                       value="{{ old('last_name') ?? $userMedia->last_name ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Обо мне</label>
                                                <input type="text" class="form-control" name="description"
                                                       placeholder="Обо мне"
                                                       required maxlength="255"
                                                       value="{{ old('last_name') ?? $userMedia->description ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Почта</label>
                                                <input id="email" class="form-control" name="email"
                                                       placeholder="Введите почту"
                                                       required maxlength="255"
                                                       value="{{ old('email') ?? $userMedia->email ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Номер телефона</label>
                                                <input id="phone" type="text" class="mask-phone form-control"
                                                       name="phone" placeholder="Номер телефона"
                                                       required maxlength="255"
                                                       value="{{ old('phone') ?? $userMedia->phone ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Сохранить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="telegram">Телеграм</label>
                                                <input type="text" class="form-control" name="telegram"
                                                       placeholder="Телеграм"
                                                       required maxlength="255"
                                                       value="{{ old('telegram') ?? $userMedia->telegram ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="whats">Ватсап</label>
                                                <input id="phone" type="text" class="mask-phone form-control"
                                                       name="whats" placeholder="whats up"
                                                       required maxlength="255"
                                                       value="{{ old('whats') ?? $userMedia->whats ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="viber">Вайбер</label>
                                                <input id="phone" type="text" class="mask-phone form-control"
                                                       name="viber" placeholder="viber"
                                                       required maxlength="255"
                                                       value="{{ old('viber') ?? $userMedia->viber ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="facebook">Ссылка на фэйсбук</label>
                                                <input type="text" class="form-control" name="facebook"
                                                       placeholder="facebook"
                                                       required maxlength="255"
                                                       value="{{ old('facebook') ?? $userMedia->facebook ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="instagram">Ссылка на инстаграм</label>
                                                <input type="text" class="form-control" name="instagram"
                                                       placeholder="instagram"
                                                       required maxlength="255"
                                                       value="{{ old('instagram') ?? $userMedia->instagram ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="in">Ссылка на linkedin</label>
                                                <input type="text" class="form-control" name="in" placeholder="in"
                                                       required maxlength="255"
                                                       value="{{ old('in') ?? $userMedia->in ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="vk">Ссылка на vk</label>
                                                <input type="text" class="form-control" name="vk" placeholder="vk"
                                                       required maxlength="255"
                                                       value="{{ old('vk') ?? $userMedia->vk ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="youtube">Ссылка на youtube</label>
                                                <input type="text" class="form-control" name="youtube" placeholder="youtube"
                                                       required maxlength="255"
                                                       value="{{ old('youtube') ?? $userMedia->youtube ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        //Код jQuery, установливающий маску для ввода телефона элементу input
        //1. После загрузки страницы,  когда все элементы будут доступны выполнить...
        $(function () {
            //2. Получить элемент, к которому необходимо добавить маску
            $("#phone").mask("+7(999) 999-9999");
        });
        $("#email").inputmask('email');
    </script>
@endsection
