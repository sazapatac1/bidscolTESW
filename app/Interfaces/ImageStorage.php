<?php 

namespace App\Interfaces;
use Illuminate\Http\Request;

interface ImageStorage {
    public function store(Request $request, $image_name);
    public function delete($image_name);
}
