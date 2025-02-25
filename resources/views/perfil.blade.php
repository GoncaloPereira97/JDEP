@extends('layouts.main_layout')

@section('content')

<main>
        <div class="container perfil w-90">
        <div class="row">
            <div class="col-lg-4 col-md-5 custom-title">
                <h1>O meu perfil</h1>
            </div>
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="avatar">
                    {{-- Se user for do tipo estudante --}}
                    @if (session()->get('user_type')===3)
                    <img src="{{ asset('images/profile_student.png') }}" alt="avatar"/>
                    {{-- Se user for do tipo instituição --}}
                    @elseif (session()->get('user_type')===2)
                    <img src="{{ asset('images/profile_institution.png') }}" alt="avatar"/>
                    @endif
                </div>
            </div>
            <div class="dados-perfil col-lg-8 col-md-7">
                {{-- Se user for do tipo estudante --}}
                @if (session()->has('email') && session()->get('user_type')===3)
                <table>
                    <tr>
                        <td><b>Primeiro Nome:</b></td>
                        <td>{{ session()->get('primeiro_nome') }}</td>
                    </tr>
                    <tr>
                        <td><b>Último Nome:</b></td>
                        <td>{{ session()->get('ultimo_nome') }}</td>
                    </tr>
                    <tr>
                        <td><b>Género:</b></td>
                        <td>{{ session()->get('genero') }}</td>
                    </tr>
                    <tr>
                        <td><b>Freguesia:</b></td>
                        <td>{{ session()->get('freguesia') }}</td>
                    </tr>
                    <tr>
                        <td><b>Concelho:</b></td>
                        <td>{{ session()->get('concelho') }}</td>
                    </tr>
                    <tr>
                        <td><b>Distrito:</b></td>
                        <td>{{ session()->get('distrito') }}</td>
                    </tr>
                    <tr>
                        <td><b>Email:</b></td>
                        <td>{{ session()->get('email') }}</td>
                    </tr>
                </table>

                {{-- Se user for do tipo instituição --}}
                @elseif (session()->get('user_type')===2)
                <table>
                    <tr>
                        <td><b>Nome:</b></td>
                        <td>{{ session()->get('primeiro_nome') }}</td>
                    </tr>
                    <tr>
                        <td><b>NIF:</b></td>
                        <td>{{ session()->get('nif') }}</td>
                    </tr>
                    <tr>
                        <td><b>Tipo:</b></td>
                        <td>{{ session()->get('tipo_instituicao') }}</td>
                    </tr>
                    <tr>
                        <td><b>Email:</b></td>
                        <td>{{ session()->get('email') }}</td>
                    </tr>
                </table>
                @endif
            </div>
        </div>
    </div>
</main>

@endsection
