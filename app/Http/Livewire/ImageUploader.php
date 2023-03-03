<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUploader extends Component
{
    use WithFileUploads;

    /**
     * @var \Livewire\TemporaryUploadedFile[]
     */
    public  $image = [];

    public function save()
    {
        $this->validate(['image.*' => 'image']);
        foreach ($this->image as $image)
            $image->store('public');
    }

    public function render()
    {
        return view('livewire.image-uploader', [
            'images' => collect(Storage::files('public'))->filter(function ($file) {
                return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['png', 'jpg', 'jpeg', 'gif', 'webp']);
            })->map(function ($file) {
                return Storage::url($file);
            })
        ]);
    }
}