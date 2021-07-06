@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
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
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
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
                            <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                            <div class="col-12">
                                <img src="{{'/storage/'.$user['img']}}" class="img-fluid" alt="Product Image">
                            </div>

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
                            <div class="mt-4">
                                <a class="btn btn-primary" href="{{ route('user.edit') }}">
                                    Изменить данные для входа
                                </a>
                            </div>


                            <div class="mt-4 product-share">
                                <a href="#" class="text-gray">
                                    <i class="fab fa-facebook-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fab fa-twitter-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-envelope-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-rss-square fa-2x"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                   href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                                 aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus
                                et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit
                                lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus
                                dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis
                                varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis
                                eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum
                                placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra.
                                Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus
                                erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse
                                venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus
                                ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        @endforeach
    </section>
@endsection
