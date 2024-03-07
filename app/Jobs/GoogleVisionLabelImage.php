<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionLabelImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $annuncement_image_id;
    /**
     * Create a new job instance.
     */
    public function __construct($annuncement_image_id)
    {
        $this->annuncement_image_id=$annuncement_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i=Image::find($this->annuncement_image_id);
      
        if(!$i){
            return;
        }
        $image= file_get_contents(storage_path('app/public/' .$i->path));
        putenv('GOOGLE_APPLICATION_CREDENTIALS='.base_path('google_credential.json'));
        $imageAnnotatorClient = new ImageAnnotatorClient();
        $response=$imageAnnotatorClient->labelDetection($image);
        $labels=$response->getLabelAnnotations();
       
        if($labels){
            $result=[];
            foreach($labels as $label){
                $result[]=$label->getDescription();
            }
            $i->labels=$result;
            $i->save();
        }
        $imageAnnotatorClient->close();
    }
}
