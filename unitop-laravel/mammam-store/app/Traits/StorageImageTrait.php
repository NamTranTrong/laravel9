<?php

namespace App\Traits;

use Str;
use Storage;

trait StorageImageTrait{

    public function storageTraitUpload($request,$fieldName,$folderName){
        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            $fileNameOrigin =$file->getClientOriginalName();
            $fileNameHash = Str::random(20).'.'.$file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/'.$folderName.'/'.auth()->id(),$fileNameHash);
            $dataImageUpload = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath),
            ];  
            return $dataImageUpload;
        }
        return null; 
    }

    public function storageTraitUploadMultiple($file,$folderName){
            $fileNameOrigin =$file->getClientOriginalName();
            $fileNameHash = Str::random(20).'.'.$file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/'.$folderName.'/'.auth()->id(),$fileNameHash);
            $dataImageUpload = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath),
            ];  
            return $dataImageUpload; 
    }
}