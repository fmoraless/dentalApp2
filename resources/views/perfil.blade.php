@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                @if(env('APP_ENV') == 'local')
                    <img src="{{ asset('uploads/avatars') }}/{{ $user->avatar ?? asset('uploads/avatars/default.png' }})"
                @else
                    <img src="{{ secure_asset('uploads/avatars'}}/{{ $user->avatar ?? asset('uploads/avatars/default.png' }})"
                         @endif
                         style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px">
                    <h2>Perfil de <strong>Dr(a). {{ Auth::user()->name .' '. Auth::user()->apellido_paterno}}</strong>
                    </h2>
                    {!! Form::open(['action' => 'UserController@updateAvatar', 'method' => 'POST', 'files' => 'true']) !!}
                    <div class="input-group pt-3">
                        <div class="custom-file">
                            {!! Form::file('avatar', ['class' => 'custom-file-input', 'id' => 'inputGroupFile',
                            'aria-describedby' => 'inputGroupFileAddon']) !!}
                            {!! Form::label('avatar_label', 'Sube una imagen de perfil', ['class' => 'custom-file-label', 'for' =>
                            'inputGroupFile']) !!}
                        </div>
                        <div class="input-group-append">
                            {!! Form::submit('Enviar',['class' => 'btn btn-outline-secondary', 'id' => 'inputGroupFileAddon'])
                            !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
