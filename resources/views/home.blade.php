@extends('layouts.main_layout')

@section('content')

<main class="back-card-home text-bem-vindo">  {{-- fundo laranja dos cards na home page e texto --}}
    <x-home.banner/>

    <div class="container">
        {{-- Se user não estiver logado --}}
        @if (!session()->has('email'))
            <x-home.registration-cards/>

        {{-- Se user estiver logado e for do tipo estudante --}}
        @elseif (session()->has('email') && session()->get('user_type')===3)
            <x-home.welcome-message/>

        {{-- Se user estiver logado e for do tipo instituição --}}
        @elseif (session()->has('email') && session()->get('user_type')===2)
            <x-home.welcome-message2/>
        @endif
    </div>
    <p class="line-footer"></p>
</main>


@endsection
