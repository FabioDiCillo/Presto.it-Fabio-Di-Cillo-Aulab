<x-layout>
        <div class="container">
                <div class="row">
                        <div class="col-12">
                                <h1 class="text-center display-1 bordi my-5 font-title color-A">{{__('ui.Accedi')}}</h1>
                        </div>   
                </div>
        </div>
        <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="contenitore-form-reg">
                                <div class="container-log">
                                        <div><img class="brand-logo" src="{{ asset('storage/img/imgnav.png') }}" alt="Logo"></div>
                                        <div class="brand-title font-title">Presto.it</div>
                                        <div class="inputs-log">
                                                <label class="my-2 lable-log font-title">Email</label>
                                                <input class="input-log" type="email" name="email" placeholder="Presto@test.com" />
                                                <label class="my-2 lable-log font-title">Password</label>
                                                <input class="input-log" type="password" name="password" placeholder="Min 8 caratteri" />
                                                <button class="button-log font-title" type="submit">{{__('ui.Accedi')}}</button>
                                        </div>
                                </div>
                        </div>
        </form>
</x-layout>



