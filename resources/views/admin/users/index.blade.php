@extends('layouts.admin_layout')

@section('title', 'Все пользователи')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        Все пользователи
                    </h1>
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
            <form method="GET" action="{{route('search')}}">
                <div class="form-row">
                    <div class="form-group col-md-11">
                        <input type="text" class="form-control" id="search" name="search" placeholder="Поиск...">
                    </div>
                    <div class="form-group col-md-1">
                        <button type="submit" class="btn btn-primary btn-block">Поиск</button>
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                ID
                            </th>
                            <th style="width: 1%">
                                Фото
                            </th>
                            <th style="width: 5%">
                                Login
                            </th>
                            <th style="width: 5%">
                                Имя
                            </th>
                            <th style="width: 5%">
                                Фамилия
                            </th>
                            <th style="width: 20%">
                                Просмотр и редактирование данных
                            </th>
                            <th style="width: 20%">
                                Ссылка
                            </th>
                            <th style="width: 10%">
                                Удаление
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                {{$user['user_id']}}
                            </td>
                            <td>
                                <div class="text-center">
                                    <img src="{{'/storage/'.$user['img']}}" alt="" class="img-fluid">
                                </div>
                            </td>
                            <td>
                                {{$user->user['name']}}
                            </td>
                            <td>
                                {{$user['first_name']}}
                            </td>
                            <td>
                                {{$user['last_name']}}
                            </td>
                            <td class="project-actions">
                                <a class="btn btn-primary btn-sm" href="{{ route('users.show', $user['id']) }}">
                                    <i class="fas fa-eye">
                                    </i>
                                    Посмотреть данные
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('users.edit', $user['user_id']) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Изменить данные для входа
                                </a>
                            </td>
                            <td>
                                <a href="/card/{{$user['slug']}}">{{Request::root().'/card/'.$user['slug']}}</a>
                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $user['user_id'])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        <i class="fas fa-trash">
                                        </i>
                                        Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            {{ $users->links() }}
        </div>

    </section>

@endsection
