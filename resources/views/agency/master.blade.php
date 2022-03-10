<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:title" content="{{ env('APP_NAME') }}" />
    <meta property="og:description" content="O porta da Agência Amapá reúne, em um só lugar, informações sobre a atuação de todas as áreas do governo." />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://agencia.amapa.gov.br" />
    <meta property="og:image" content="https://agencia.amapa.gov.br/gov.jpg" />

    <meta property="og:locale" content="pt_BR" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <meta name="description" content="O porta da Agência Amapá reúne, em um só lugar, informações sobre a atuação de todas as áreas do governo." />
    <meta property="creator.productor" content="https://prodap.amapa.gov.br" />
    <meta name="keywords" content="Agência Amapá, Amapá, Notícias Amapá, Governo Amapá">
    <meta name="author" content="PRODAP - Centro de Gestão da Tecnologia da Informação">
    @stack('meta')
    <link rel="stylesheet" href="{{ mix('css/agency.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('css')

    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<header>
    {{--INICIO TOPO UM--}}
    <div class="container-fluid bg-blue-primary py-3 text-white text-end" id="topo_um">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li class="list-inline-item">SECRETARIAS</li>
                        <li class="list-inline-item">PORTAL DA TRANSPARÊNCIA</li>
                        <li class="list-inline-item"><i class="fas fa-sign-language"></i> ACESSIBILIDADE</li>
                    </ul>
                    |
                    <span class="socials">
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-youtube"></i>
                    </span>

                </div>
            </div>
        </div>
    </div>
    {{--FIM TOPO UM--}}

    {{--INICIO TOPO DOIS--}}
    <div class="container-fluid bg-blue-secondary text-white py-3" id="topo_dois">
        <div class="container">
            <div class="row">
                <div class="col-md-4 logo_gov">
                    <a href="{{ route('agency.index') }}" class="text-white">
                        <img src="{{ asset('images/logo-branca.png') }}" class="me-2" width="35" alt=""><strong>AMAPÁ</strong> GOVERNO DO ESTADO
                    </a>
                </div>
                <div class="col-md-4 menu_pesquisa">
                    <div class="input-group">
                        <input type="search" class="form-control rounded" placeholder="Pesquisa..." aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn ms-2 text-white"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="col-md-4 text-end logo_ag">
                    Agência de Notícias
                </div>
            </div>
        </div>
    </div>
    {{--FIM TOPO DOIS--}}

    {{--INICIO MENU--}}
    <div class="container">
        <div class="row my-4">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light my-sm-3">
                    <a class="navbar-brand text-blue-secondary" href="{{ route('agency.index') }}"><i class="fas fa-home"></i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav navbar-center">
                            @foreach($categories as $category)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-center menu-item" href="#" id="DropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"  style="border-bottom: 8px solid {{ $category->color }}; color: {{ $category->color }}">{{ $category->name }}</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ route('agency.post-category',$category->slug) }}"><i class="fas fa-list"></i> Ler todas</a></li>
                                        @foreach($category->subcategories as $subcategory)
                                            <li><a class="dropdown-item" href="{{ route('agency.post-subcategory',[$category->slug,$subcategory->slug]) }}">{{ $subcategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    {{--FIM MENU--}}
</header>
@yield('main')
<footer class="mt-5">
    <div class="container-fluid bg-blue-primary text-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <strong>GOVERNO DO ESTADO DO AMAPÁ</strong>
                    <p>Site desenvolvido e hospedado pelo PRODAP Centro de Gestão da Tecnologia da Informação</p>
                    {{ date('Y') }} - Licença Creative Commons 3.0 International
                </div>
                <div class="col-md-2">
                    <img src="{{ asset('images/brasao-branco.png') }}" class="img-fluid" alt="Brasão">
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{ asset('js/app.js') }}"></script>
@stack('js')
</body>
</html>
