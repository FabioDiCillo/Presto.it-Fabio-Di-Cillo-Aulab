<header>

    <div class="overlay ">
        <h2 class="t-header my-5">Hi Tech, Hi Fun</h1>
        <h3 class="h3-header my-5">{{__('ui.Header')}}</h3>
       
        <div>
            
            {{-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form> --}}
        </div>
            <br>
          
            <form action="{{route('announcement.create')}}"  method="GET">
                @csrf
                <button class="btn-get-started">{{__('ui.Annuncio')}}</button>
            </form>         
     </div>
</header>