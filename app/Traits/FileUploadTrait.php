<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Image;

trait FileUploadTrait {

    /**
     * @param string $url_string
     * @return array
     */
    public function uploadFile( $url_string, $fieldname = 'images', $directory = null ) 
    {
        $folder_path = storage_path('app/public/images/');
        $saved_images = array();

        $urls = explode(',' , $url_string);

        foreach ($urls as $url) 
        {
            $filename = basename($url);
            $full_path = $folder_path.$directory.$filename;
            $image = Image::make($url)->save($full_path);
            $saved_images[] = $full_path;
        }

        return $saved_images;
    }
}