<div>
@if (session()->has('message'))
<div class="justify-content-center my-2 alert alert-success">
{{ session('message') }}
</div>
@endif
<div class="container contenitore-custom">
    <div class="row">
        <div class="col-12">
        <form wire:submit.prevent="store">
    @csrf
    <div class="mb-3 my-4">
        <label class="form-label fs-5">{{__('ui.Titolo')}}</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror lableCustom" wire:model.live="title">
        @error('title')
        {{$message}}
        @enderror
    </div>
    <div class="mb-3 my-3">
    <label class="form-label fs-5">{{__('ui.Descrizione')}}</label>
    <textarea class="form-control @error('description') is-invalid @enderror lableCustom" wire:model.live="description"></textarea>
    @error('description')
        {{$message}}
    @enderror
</div>
    <div class="mb-3 my-3">
        <label class="form-label fs-5">{{__('ui.Prezzo')}}</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror lableCustom" wire:model.live="price">
        @error('price')
        {{$message}}
        @enderror
    </div>
    <div class="mb-3 my-4">
        <p class="fs-5">{{__('ui.Scegli')}}</p>
    <select wire:model.defer="category" class="form-select  @error('category') is-invalid @enderror lableCustom" aria-label="Default select example">
        <option value="" selected></option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{__("ui.$category->name")}}</option>
        @endforeach
    </select>
    @error('category')
    {{$message}}
    @enderror
    </div>
    <div class="mb-3 my-3">
        <input wire:model="temporary_images" type="file" name="images" multiple class="lableCustom form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
        @error('temporary_images.*')
           <p class="text-danger mt-5">{{$message}}</p>
        @enderror
    </div>
    @if (!empty($images))
    <div class="row">
        <div class="col-12">
            <p>Photo Preview:</p>
            <div class="bordoCustom row border roundend shadow py-4">
                @foreach ($images as $key => $image)
                <div class="col-12 my-3"> 
                    <div class="img-preview mx-auto shadow roundend" style="background-image: url({{$image->temporaryUrl()}});"></div>
                </div>
                <div>    
                    <button type="button" class="btn btn-danger shadow d-block text-center mt-3 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <div class="text-center my-3">
        <button type="submit" class="btn btn-warning">{{__('ui.Annuncio')}}</button>
    </div>  
</form>
        </div>
    </div>
</div>
</div>
