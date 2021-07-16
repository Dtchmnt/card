@extends('layouts.admin_layout')

@section('title', 'Данные')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        Пользователь {{$media['first_name']}} {{$media['last_name']}}
                    </h1>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
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
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{'/storage/'.$media['img']}}" alt="" class="img-fluid">
                    </div>
                    <form action="{{ route('admin.updateAvatar', $media->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="form-group">
                        <label for="img">Загрузить аватар</label><br>
                        <input type="file" name="img" id="img">
                    </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                    <div class="card-body">
                        <strong><i class="text"></i> Описание</strong>
                        <h2 class="text-muted">
                            {{$media['description']}}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <strong><i class="fas fa-phone mr-1"></i> Номер телефона</strong>
                        <p class="text-muted">
                            {{$media['phone']}}
                        </p>
                        <hr>
                        <strong><i class="fab fa-telegram-plane mr-1"></i> Телеграмм</strong>
                        <p class="text-muted">
                            {{$media['telegram']}}
                        </p>
                        <hr>
                        <strong><i class="fab fa-whatsapp mr-1"></i> WhatsUp</strong>
                        <p class="text-muted">
                            {{$media['whats']}}
                        </p>
                        <hr>
                        <strong><i class="fab fa-viber mr-1"></i> Viber</strong>
                        <p class="text-muted">
                            {{$media['viber']}}
                        </p>
                        <hr>
                        <strong><i class="fab fa-facebook mr-1"></i> Facebook</strong>
                        <p class="text-muted">
                            {{$media['facebook']}}
                        </p>
                        <hr>
                        <strong><i class="fab fa-instagram mr-1"></i> Instagram</strong>
                        <p class="text-muted">
                            {{$media['instagram']}}
                        </p>
                        <hr>
                        <strong><i class="fab fa-linkedin mr-1"></i> Linkedin</strong>
                        <p class="text-muted">
                            {{$media['in']}}
                        </p>
                        <strong><i class="fab fa-vk mr-1"></i> Vk</strong>
                        <p class="text-muted">
                            {{$media['vk']}}
                        </p>
                        <strong><i class="fab fa-youtube mr-1"></i> Youtube</strong>
                        <p class="text-muted">
                            {{$media['youtube']}}
                        </p>
                        <strong><i class="fab fa-twitter mr-1"></i> twitter</strong>
                        <p class="text-muted">
                            {{$media['twitter']}}
                        </p>
                        <hr>
                            <a class="btn btn-primary btn-sm" href="{{ route('media.edit', $media['id']) }}"><b>Изменить данные</b></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-primary card-outline">
            <!-- /.card-body -->
        </div>
@endsection
