
@extends('layouts.main_layout')

@section('content')

<div class="verificar container container-form ">
    <div class="formulario form-login mg-v">
        <div class="">
            <h1 class="text-center tx-pt">Email Enviado</h1>
            <div>
                <form action="{{ route('homeRed') }}" method="POST" class="form-login">
                    @csrf
                    <div>
                            <div class="fmt-txt text-center">
                                <h2 >Foi enviado um email de verificação por favor valide a sua conta. <br><br>
                                    <button class="button-link" type="submit" href=""><h3>Voltar à Pagina Principal</h3></button>
                                </h2>
                            </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection

