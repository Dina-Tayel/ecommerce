<?php 


namespace App\Traits;

use Illuminate\Support\Facades\File;

trait MediaTrait
{

    public function uploadFile($fileName,$folderPath)
    {

        if($fileName)
        {
            $extension=$fileName->getClientOriginalExtension();
            $fileUpload= uniqid()  . time()  . rand(1111,9999) . '.' . $extension ;
            $path=public_path($folderPath)  ;
            $fileName->move( $path , $fileUpload) ;
            return $fileUpload ;
        }

    }


    public function deleteFile($oldFile)
    {
        if(File::exists($oldFile)){
            File::delete($oldFile);
        }
    }



}