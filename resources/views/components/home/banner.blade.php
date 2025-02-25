<section class="banner">
    {{-- <img src="{{ asset('images/banner.jpg') }}" alt="icon"> --}}
    @if (!session()->has('email'))
        <h1>
            Aqui podes <span class="other-color">decidir o teu futuro.</span>
        </h1>
        <h2>Temos um teste vocacional para te ajudar a escolher o teu percurso formativo.</h2>
        <a href="{{ route('login') }}" class="button-link">Faz login para aceder ao teste</a>

    @elseif (session()->has('email') && session()->get('user_type')===3)
        <h1>
            Aqui podes <span class="other-color">decidir o teu futuro.</span>
        </h1>
        <h2>Temos um teste vocacional para te ajudar a escolher o teu percurso formativo.</h2>
        <a href="{{ route('teste-vocacional-intro') }}" class="button-link">Aceder ao teste vocacional</a>

    @elseif (session()->has('email') && session()->get('user_type')===2)
        <h1>
            Aqui pode <span class="other-color">consultar as estatísticas do teste vocacional</span>
        </h1>
        <h2>Temos os resultados do teste vocacional por estatísticas</h2>
        <a href="{{ route('resultados-estatisticos') }}" class="button-link">Aceder às estatísticas do teste vocacional</a>
    @endif
</section>
