<?php
namespace App\Traits;
use Str;
use Illuminate\Support\Facades\Storage;

trait StorageImageTrait
{
    public function StorageImageTrait($request, $fieldName, $folderName)
    {
        $getFile = $request->$fieldName;
        $originName = $getFile->getClientOriginalName();
        $nameHash = Str::random(20) . '.' . $getFile->getClientOriginalExtension();
        $filePath = $getFile->storeAs('public/' . $folderName . '/' . auth()->id(), $nameHash);
        $dataImage = [
            'image_name' => $originName,
            'image_path' => Storage::url($filePath),
        ];
        return $dataImage;
    }

    public function StorageImageMultipleTrait($fieldName, $folderName)
    {
        $originName = $fieldName->getClientOriginalName();
        $nameHash = Str::random(20) . '.' . $fieldName->getClientOriginalExtension();
        $filePath = $fieldName->storeAs('public/' . $folderName . '/' . auth()->id(), $nameHash);
        $dataImage = [
            'image_name' => $originName,
            'image_path' => Storage::url($filePath),
        ];
        return $dataImage;
    }
}