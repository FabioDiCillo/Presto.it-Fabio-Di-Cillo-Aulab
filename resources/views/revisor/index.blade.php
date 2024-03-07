<x-layout>
    <div class="container my-5 bordi">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 text-center font-title">{{$announcement_to_check ? __('ui.AnnunciDaRevisionare') : __('ui.NonCiSonoAnnunci') }}</h1>
            </div>
        </div>
    </div>
    @if($announcement_to_check)
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card cardCustomShow2">
                    <div id="carouselExample" class="carousel slide">
                        @if ($announcement_to_check->images->isNotEmpty())
                        <div class="carousel-inner">
                            @foreach ($announcement_to_check->images as $image)
                            <div class="carousel-item @if($loop->first)active @endif">
                                <img src="{{$image->getUrl(400, 300)}}" class="img-fluid p-3 roundend" alt="...">
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/400/300" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/401/300" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/402/300" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        @endif
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <i class="fa-solid fa-circle-chevron-left fa-2x iconCarosel" aria-hidden="true"></i>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <i class="fa-solid fa-circle-chevron-right fa-2x iconCarosel" aria-hidden="true"></i>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-3 ms-3">
                <div class="card cardCustom">
                    <div class="card-body">
                        <h5 class="card-title font-title fs-3 bordi">{{$announcement_to_check->title}}</h5>
                        <p class="card-text"><span class="fs-5">{{__('ui.Descrizione')}}:</span> {{$announcement_to_check->description}}</p>
                        <p class="card-text"><span class="fs-5">{{__('ui.Prezzo')}}:</span> {{$announcement_to_check->price}}€</p>
                        <p class="card-text"><span class="fs-5">{{__('ui.Categoria')}}:</span> {{$announcement_to_check->category->name}}</p>
                        <p class="card-text"><span class="fs-5">{{__('ui.Data')}}:</span> {{$announcement_to_check->created_at->format('d/m/Y')}}</p>
                        <h5 class="font-title">Tags:</h5>
                        @foreach ($announcement_to_check->images as $image)
                            @if($image->labels)
                                @php
                                    $labelString = implode(', ', $image->labels);
                                @endphp
                                <p>{{$labelString}}</p>
                            @endif
                        @endforeach
                        <h5 class="font-title">Revisioni immagini:</h5>
                        @foreach ($announcement_to_check->images as $image)
                            @if($image->labels)
                            @endif
                            <p>Adulti: <span class="{{$image->adult}}"></span></p>
                            <p>Satira: <span class="{{$image->spoof}}"></span></p>
                            <p>Medicina: <span class="{{$image->medical}}"></span></p>
                            <p>Violenza: <span class="{{$image->violence}}"></span></p>
                            <p>Contenuti ammiccanti: <span class="{{$image->racy}}"></span></p>
                        @endforeach
                        <div class="d-flex justify-content-between">
                            <form action="{{route('revisor.reject_announcement',['announcement'=>$announcement_to_check])}}" method="POST" class="mr-2">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger my-2">
                                    Rifiuta
                                </button>
                            </form>                           
                            <form action="{{route('revisor.accept_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success my-2">
                                    Accetta
                                </button>
                             </form>
                        </div>                         
                    </div>
                </div>
            </div>
        </div> 
    </div>        
    @endif            
</x-layout>