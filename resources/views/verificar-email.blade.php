

@extends('layouts.main_layout')

@section('content')

<div class="verificar container container-form ">
    <div class="formulario form-login mg-v">
        <div class="">
            <h1 class="text-center tx-pt">Verifica teu email</h1>
            <div>
                <form action="{{ route('notificar') }}" method="POST" class="form-login">
                    @csrf
                    <div>
                            <div class="fmt-txt text-center">
                                <h2 >Antes de prosseguir, por favor cheque seu email com link de verificação de conta.
                                    Se não recebeu o link <br><br>
                                    <button class="button-link" type="submit"><h3 >Clique aqui para solicitar outro</h3></button>
                                </h2>
                            </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection


