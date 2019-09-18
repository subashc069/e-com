<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * @package App\Traits
 */
trait UploadAble
{
   public function uploadOne(UploadedFile $file, $folder = null, $disk = 'public', $filename = null)
   {
       $name =!is_null($filename) ? $filename : str_random(25);

       return $file->storeAs(
           $folder,
           $name . "." . $file->getClientOrOriginalExtension(),
           $disk
       );
   } 

   public function deleteOne($path = null, $disk = 'public')
   {
       Storage::disk($disk)->delete($path);
   }
}
