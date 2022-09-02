<?php

namespace App\Helper;

// use Intervention\Image\Facades\Image;

class FileUpload{

    public static function upload($file,$folder)
    {
        return $file->storeAs($folder, time().'_'.$file->getClientOriginalName());
    }

    // public static function lenImageUpload($file,$folder)
    // {
    //     $image = Image::make($file);
    //     $image->resize(400,600, function ($constraint) {
    //         $constraint->aspectRatio();
    //     });
    //     $destinationPath = storage_path("app/".$folder);
    //     File::exists($destinationPath) or File::makeDirectory($destinationPath);

    //     $url = $image->save($destinationPath."/" . time() .$file->getClientOriginalName());
    //     // dd($folder,$url->basename);
    //     return str_replace('public/','',$folder).'/'.$url->basename;
    // }

}



