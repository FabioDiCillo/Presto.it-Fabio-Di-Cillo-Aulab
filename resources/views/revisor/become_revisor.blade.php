<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center display-1 bordi my-5 font-title">Diventa un revisionatore</h1>
                @if (session()->has('message'))
                <div class="justify-content-center my-2 alert alert-success text-center">
                {{ session('message') }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <form action="{{route('become.revisor')}}" method="POST">
                @csrf
                <div class="contenitore-form-reg">
                    <div class="container-log">
                            <div><img class="brand-logo" src="{{ asset('storage/img/imgnav.png') }}" alt="Logo"></div>
                            <div class="brand-title font-title">Presto.it</div>
                            <div class="inputs-log">
                                    <label class="my-2 lable-log font-title">Email</label>
                                    <input class="input-log" type="email" name="email" value="{{ auth()->check() ? auth()->user()->email : '' }}"/>
                                    <label class="my-2 lable-log font-title">Nome e cognome</label>
                                    <input class="input-log" type="text" name="name" value="{{ auth()->check() ? auth()->user()->name : '' }}" />
                                    <button class="button-log font-title" type="submit">Diventa Revisionatore</button>
                            </div>
                    </div>
                </div>
    </form>
</x-layout>