@extends('agency.master')

@push('meta')

@endpush

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
    @livewireStyles
@endpush

@section('main')
    <main>
        @include('agency.modals.video-modal')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('agency.index') }}">Início</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('agency.post-index') }}">Todas as notícias</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('agency.post-category',$category->slug) }}">{{ $category->name }}</a></li>
                            <li class="breadcrumb-item active">{{ $subcategory->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    @livewire('agency-post-subcategory-list',
                    [
                        'idCategory' => $idCategory,
                        'category' => $category,
                        'idSubcategory' => $idSubcategory,
                        'subcategory' => $subcategory
                    ])
                </div>
                <div class="col-md-4">
                    <div class="titles text-blue-secondary">Últimas Notícias</div>

                    <x-last-notice-component/>

                </div>
            </div>

            <!-- PUBLICIDADE INICIO -->
            <div class="row">
                @if($banners_two)
                    <div class="col-md-12 py-2 py-md-5">
                        <img src="{{URL::asset('storage/ads/'.$banners_two->image) }}" class="img-fluid" alt="">
                    </div>
                @endif
            </div>
            <!-- PUBLICIDADE FIM -->
        </div>
    </main>
@endsection

@push('js')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#tourism').on('change', function(){
                window.location = $(this).val();
            });

            $('.select2').select2({
                theme: "bootstrap-5",
            });

            //Fake Img
            $('#imageView img').replaceWith(function(i, v){
                return $('<div/>', {
                    style: 'background-image: url(' + this.src + ');' +
                        'width:' + this.width + 'px;' +
                        'height:' + this.height + 'px;' ,
                    class: 'fakeImg'
                })
            })

        });
    </script>
@endpush

