<div class="container">
    <h1>Bem-vind@ à Plataforma Jornadas da Descoberta do Ensino Profissional</h1>
</div>

<section>
    <div class="card-wrapper">
        <div class="flip3D">
            <div class="card back">
                <h2>Registo Estudante</h2>
                <p>Faça o seu registo de estudante</p>
                <a class="button-link" href="{{ route('registo-estudante') }}">Registar</a>
            </div>
            {{-- <div class="card front">
                <h2>Registo Estudante</h2>
                <img src="{{ asset('images/laptop.gif') }}" width="150" alt="">
            </div> --}}
        </div>
        <div class="flip3D">
            <div class="card back">
                <h2>Registo Instituição</h2>
                <p>Registe a sua instituição</p>
                <a class="button-link" href="{{ route('registo-instituicao') }}">Registar</a>
            </div>
            {{-- <div class="card front">
                <h2>Registo Instituição</h2>
                <img src="{{ asset('images/campus.gif') }}" width="150" alt="">
            </div> --}}

        </div>
        <div class="flip3D">
            <div class="card back">
                <h2>Área Login</h2>
                <p>Aceda à sua área pessoal</p>
                <a class="button-link" href="{{ route('login') }}">Login</a>
            </div>
            {{-- <div class="card front">
                <h2>Área Login</h2>
                <img src="{{ asset('images/door.gif') }}" width="150" alt="">
            </div> --}}
        </div>
    </div>
</div>
