<?php 

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage {
    public function store($request, $image_name){
        if($request->hasFile('item_image')) {
            Storage::disk('images')->put($image_name,file_get_contents($request->file('item_image')->getRealPath()));
        }
    }
}
