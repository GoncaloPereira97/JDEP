<nav class="navbar sticky-top navbar-expand-lg">
    <div class="container-fluid">
      <div class="links-registration-992">
        @if (!session()->has('email'))
            <a class="btn-link btn-user" href="{{ route('login') }}">
                <i class="fas fa-user"><span class="mx-1">Login</span></i>
            </a>
            <a class="btn-link btn-user" href="{{ route('registo-estudante') }}">
                <i class="fas fa-sign-in-alt"><span class="mx-1">Registar</span></i>
            </a>
        @elseif (session()->has('email') && session()->get('user_type')===3)
            <a class="btn-link btn-user" href="{{ route('perfil') }}">
                <i class="fas fa-user"><span class="mx-1">{{ session()->get('primeiro_nome') }}</span></i>
            </a>
            <a class="btn-link btn-user" href="{{ route('logout') }}">
                <i class="fa-solid fa-right-from-bracket"><span class="mx-1">Logout</span></i>
            </a>
        @elseif (session()->has('email') && session()->get('user_type')===2)
        <a class="btn-link btn-user" href="{{ route('perfil') }}">
            <i class="fas fa-user"><span class="mx-1">{{ session()->get('primeiro_nome') }}</span></i>
        </a>
        <a class="btn-link btn-user" href="{{ route('logout') }}">
            <i class="fa-solid fa-right-from-bracket"><span class="mx-1">Logout</span></i>
        </a>
        @endif
      </div>
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler order-first" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navbarLinks">
                <li class="nav-item">
                    <a class="navlink link-active" aria-current="page" href="{{ route('home') }}">Início</a>
                </li>
                <li class="nav-item">
                    <a class="navlink" href="{{ route('sobre-nos') }}">Sobre nós</a>
                </li>
                @if (session()->has('email') && session()->get('user_type')===3)
                <li class="nav-item">
                    <a class="navlink" href="{{ route('teste-vocacional-intro') }}">Teste vocacional</a>
                </li>
                @elseif (session()->has('email') && session()->get('user_type')===2)
                <li class="nav-item">
                    <a class="navlink" href="{{ route('resultados-estatisticos') }}">Estatísticas</a>
                </li>
                <li class="nav-item">
                    <a class="navlink" href="{{ route('registo-curso') }}">Adicionar Curso</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="navlink" href="{{ route('guia') }}">Guia de Pesquisa</a>
                </li>
                <li class="nav-item">
                    <a class="navlink" href="{{ route('curso-all') }}">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="navlink" href="{{ route('contactos') }}">Contactos</a>
                </li>
            </ul>
          </div>
        </div>
    </div>
    <div class="links-registration">
        @if (!session()->has('email'))
            <a class="btn-link btn-user" href="{{ route('login') }}">
                <i class="fas fa-user"><span class="mx-1">Login</span></i>
            </a>
            <a class="btn-link btn-user" href="{{ route('registo-estudante') }}">
                <i class="fas fa-sign-in-alt"><span class="mx-1">Registar</span></i>
            </a>

        {{-- Se user estiver logado e for do tipo estudante --}}
        @elseif (session()->has('email') && session()->get('user_type')===3)
            <a class="btn-link btn-user" href="{{ route('perfil') }}">
                <i class="fas fa-user"><span class="mx-1">{{ session()->get('primeiro_nome') }}</span></i>
            </a>
            <a class="btn-link btn-user" href="{{ route('logout') }}">
                <i class="fa-solid fa-right-from-bracket"><span class="mx-1">Logout</span></i>
            </a>

        {{-- Se user estiver logado e for do tipo instituição --}}
        @elseif (session()->has('email') && session()->get('user_type')===2)
        <a class="btn-link btn-user" href="{{ route('perfil') }}" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
            <i class="fas fa-user">
                <span class="mx-1">{{ session()->get('primeiro_nome') }}</span>
            </i>
        </a>
        <a class="btn-link btn-user" href="{{ route('logout') }}">
            <i class="fa-solid fa-right-from-bracket"><span class="mx-1">Logout</span></i>
        </a>
        @endif
    </div>
</nav>
