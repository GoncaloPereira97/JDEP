@extends('layouts.main_layout')

@section('content')
<div class="container custom-container-form">
    <div class="formulario form-largura">
        <div class="row">

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{$request->route('token')}}">
                <h2 class="text-center">Recuperar palavra-passe</h2>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
                @endif
                <div class="custom-container custom-container-form zp">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" value="{{ $request->email }}" readonly>
                </div>

                <div class="custom-container custom-container-form zp c2">
                    <label for="password" class="form-label">Nova palavra-passe</label>
                    <input name="password" type="password" class="form-control">

                    <label for="password_confirmation" class="form-label fl-mt">Confirme a nova palavra-passe</label>
                    <input name="password_confirmation" type="password" class="form-control">

                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="container-form text-center">
                        <button type="submit" class="button-link c-form-margin">Enviar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection



