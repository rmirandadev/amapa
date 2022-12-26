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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    @stack('css')

    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<header>
    {{--INICIO TOPO UM--}}
    <div class="container-fluid bg-blue-primary py-3 text-white" id="topo_um">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-end">
                        <span class="mt-2">
                            <ul>
                                <li class="list-inline-item">PORTAL DA TRANSPARÊNCIA</li>
                                <li class="list-inline-item"><i class="fas fa-sign-language"></i> ACESSIBILIDADE</li>
                            </ul>

                            <span class="mx-2">|</span>

                            <span class="socials me-3">
                                @foreach($socials as $social)
                                    <a href="{{ $social->link }}" target="_blank" class="text-white">{!! $social->icon !!}</a>
                                @endforeach
                            </span>
                        </span>
                        <select class="form-select form-select-sm w-50" id="select-2">
                            <option></option>
                            @foreach($companies as $company)
                                <option value="{{ $company->link }}">{{ $company->initials }} - {{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('#select-2').select2({
            theme: 'bootstrap-5',
            placeholder: "Secretarias...",
        }).on('change', function () {
            let url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.open(url, '_blank');
            }
            return false;
        });

        $('#prefetures').select2({
            theme: 'bootstrap-5',
            placeholder: "Prefeituras...",
        }).on('change', function () {
            let url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.open(url, '_blank');
            }
            return false;
        });
    });
</script>
@stack('js')
</body>
</html>
