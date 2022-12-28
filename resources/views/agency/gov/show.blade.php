@extends('agency.master')

@push('meta')

@endpush

@push('css')

@endpush

@section('main')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('agency.index') }}">Início</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('agency.gov-index') }}">Estrutura de Governo</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $gov->name }}</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-12">
                    <h2 class="mb-4"><strong class="text-blue-secondary">{{ $gov->name }}</strong></h2>
                   <div class="row">
                       <div class="col-md-3">
                           <img src="{{ URL::asset('storage/structures/'.$gov->image) }}" alt="Imagem" class="img-fluid img-thumbnail shadow mb-3">
                       </div>
                       <div class="col-md-9">
                           <p>{!! $gov->text !!}</p>
                       </div>
                   </div>
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

@endpush

