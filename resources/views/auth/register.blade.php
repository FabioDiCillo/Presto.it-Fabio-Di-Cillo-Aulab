<x-layout>
    <div class="container">
        <div class="row">
                <div class="col-12">
                        <h1 class="text-center display-1 bordi my-5 font-title color-A">{{__('ui.Registrati')}}</h1>
                </div>
           
        </div>
</div>
                        <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="contenitore-form-reg">
                                <div class="container-reg">
                                        <div><img class="brand-logo" src="{{ asset('storage/img/imgnav.png') }}" alt="Logo"></div>
                                        <div class="brand-title font-title">Presto.it</div>
                                        <div class="inputs-reg">
                                                <label class="my-2 lable-reg font-title">{{__('ui.Nome')}}</label>
                                                <input class="input-reg" type="text" name="name" placeholder="Mario Rossi" />
                                                <label class="my-2 lable-reg font-title">Email</label>
                                                <input class="input-reg" type="email" name="email" placeholder="mariorossi@presto.it" />
                                                <label class="my-2 lable-reg font-title">Password</label>
                                                <input class="input-reg" type="password" name="password" placeholder="Min 8 caratteri" />
                                                <label class="my-2 lable-reg font-title">{{__('ui.Conferma')}}</label>
                                                <input class="input-reg" type="password" name="password_confirmation" placeholder="Min 8 caratteri" />
                                                <button class="button-reg font-title" type="submit">{{__('ui.Registrati')}}</button>
                                        </div>
                                </div>
                        </div>
                        </form>
</x-layout>

     <!-- <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nome e cognome</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="name">
                                
                        </div>

                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Indirizzo Mail</label>
                                <input type="email" class="form-control"  aria-describedby="emailHelp" name="email">
                                
                        </div>
                        
                        <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password"> 
                        </div>

                        <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Conferma Password</label>
                                <input type="password" class="form-control" name="password_confirmation"> 
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Registrati</button>
                </form> -->