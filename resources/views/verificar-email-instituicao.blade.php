
@extends('layouts.main_layout')

@section('content')

<div class="container container-form ">
    <div class="formulario form-login mg-v">
        <div class="">
            <h2 class="text-center tx-pt">Conta não verificada</h2>
            <div>
                <form action="{{}}" method="POST" class="form-login">
                    @csrf
                    <div>
                            <div class="fmt-txt text-center">
                                <h2 >A sua conta aguarda verificação da nossa equipa. <br><br>
                                </h2>
                            </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection


