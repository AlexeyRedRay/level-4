<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class Images
{
    public static function addImage($person, $images)
    {
        foreach ($images as $image)
        {
            $image_path = $image->store('images', 'public');
            $image_name = pathinfo($image_path)['basename'];
            $person->images()->create([
                'name' => $image_name,
            ]);
        }
    }

    public static function delImage($person, $del_images)
    {
        foreach ($del_images as $image)
        {
            Storage::disk('public')->delete("images/$image");
            $person->images()->where('name', $image)->delete();
        }
    }
}
