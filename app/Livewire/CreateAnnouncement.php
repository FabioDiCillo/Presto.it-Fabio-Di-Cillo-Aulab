<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
// use Spatie\Backtrace\File;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{

    use WithFileUploads;

    
    public $category;
    // #[Validate]
    public $title = '';
    // #[Validate]
    public $price = '';
    // #[Validate] 
    public $description = '';
    public $images = [];
    public $temporary_images;
    public $announcement; 


    protected $rules = 
    [
        'title'=> "required|min:4",
        'price'=> "required|numeric",
        'description'=>"required|min:4",
        'category'=>"required",
        'images.*' => "image|max:1024",
        'temporary_images.*' =>'image|max:1024',
        
    ];


    protected $messages=[
        'required'=>'il campo :attribute è obbligatorio',
        // 'title.required'=>'Il campo è obbligatorio',
        'title.min'=>'Inserire piu di 4 caratteri',
        // 'price.required'=>'Il campo è obbligatorio',
        'price.numeric'=>'Inserisci un importo valido',
        // 'description.required'=>'Il campo è obbligatorio',
        'description.min'=>'Inserire piu di 4 caratteri',
        // 'category.required'=>'Il campo è obbligatorio',
        'temporary_images.max:1024' => 'L\'immagine dev\'essere massimo di 1 mb',
        'images.max:1024' => 'L\'immagine dev\'essere massimo di 1 mb',
    ];


    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    
   
    
    public function store()
{
    $this->validate();
    $category = Category::find($this->category);
    
   
    if ($category) {
       

        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
        if(count($this->images)){
            foreach($this->images as $image) {
           
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName , 'public')]);
                
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 400, 300),
                     new GoogleVisionSafeSearch($newImage->id),
                     new GoogleVisionLabelImage($newImage->id)

                ])->dispatch($newImage->id);

            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        
        } 

     
        $this->announcement->save();

        $this->cleanForm();
        return redirect(route("announcement.create"))->with('message', 'Annuncio creato con successo!');
    }else {

        return redirect()->back()->with('error', 'Categoria non valida!');
    }

}

    public function cleanForm(){
        $this->title = "";
        $this->price = "";
        $this->description = "";
        $this->images = [];
        $this->temporary_images = [];
    }

    public function updatedTemporaryImages(){
        if ($this->validate([
            "temporary_images.*" => "image|max:1024",
        ])) {
            foreach ($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
        
    }

    public function removeImage($key){
        if (in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
        
    }
    
    public function render()
    {
        return view('livewire.create-announcement');
    }
}
