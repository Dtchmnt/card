<!DOCTYPE html>
<html lang="ru-RU">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$media->first_name}} {{$media->last_name}}</title>
    <link href="{{ asset('css/page.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<body>
<div class="background"></div>
<div class="page" style="background-color: #243445">
    <div class="pic" style="background-image: url(/storage{{'/'.$media['img']}})"></div>
    <div class="over-content">
        <div class="pcontent">
            <div class="name">
                {{$media->first_name}} {{$media->last_name}}</div>
            <div class="description">
                {{$media->description}} </div>
            <div class="description2ndline">
                &nbsp;
            </div>
            <a class="vcard" href="{{route('downloadVcard', $media->id)}}" target="_blank">
                Add to phone contacts </a>
            <div class="button-list count6">
                @if($media->phone)
                    <a href="tel:{{$media->phone}}" class="button phone">
                        @endif
                        <i></i></a>
                    @if($media->telegram)
                        <a href="{{ url('https://t.me/').$media->telegram }}" class="button tg">
                            @endif
                            <i></i></a>
                        @if($media->vk)
                            <a href="{{ url($media->vk)}}" class="button vk">
                                @endif
                                <i></i></a>
                            @if($media->whats)
                                <a href="https://api.whatsapp.com/send?phone={{$media->whats}}" class="button whatsapp">
                                    @endif
                                    <i></i></a>
                                @if($media->viber)
                                    <a href="viber://contact?number=%2B{{$media->viber}}" class="button viber">
                                        @endif
                                        <i></i></a>
                                    @if($media->facebook)
                                        <a href="{{ url($media->facebook)}}" class="button facebook">
                                            @endif
                                            <i></i></a>
                                        @if($media->email)
                                            <a href="mailto:{{$media->email}}" class="button mail">
                                                @endif
                                                <i></i></a>
                                            @if($media->instagram)
                                                <a href="{{ url($media->instagram)}}" class="button instagram">
                                                    @endif
                                                    <i></i></a>
                                                @if($media->in)
                                                    <a href="{{ url($media->in) ?? ''}}" class="button linkedin">
                                                        @endif
                                                        <i></i></a>
                                                    @if($media->youtube)
                                                        <a href="{{url($media->youtube)}}" class="button youtube">
                                                            @endif
                                                            <i></i></a>
                                                        @if($media->twitter)
                                                            <a href="{{url($media->twitter)}}" class="button twitter">
                                                                @endif
                                                                <i></i></a>
            </div>
        </div>
        <div class="page-footer">
            <a href="#">Сделано с душой</a>
        </div>
    </div>
</div>
</body>

</html>
