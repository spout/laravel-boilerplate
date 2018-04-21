<?php

namespace App\Observers;

use App\Models\Gallery;
use App\Models\Photo;

class GalleryObserver
{
    public function saved(Gallery $gallery)
    {
        // Delete all associated photos
        Photo::where('gallery_id', $gallery->id)->delete();

        // Create all photos
        foreach (request()->input('photos', []) as $k => $photo) {
            Photo::create([
                'gallery_id' => $gallery->id,
                'path' => $photo['path'],
                'caption' => $photo['caption'],
                'sort' => $photo['sort'],
            ]);
        }
    }
}