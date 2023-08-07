<?php
    namespace App\Traits;
    use Str;
    use Storage;
    trait StorageImageTrait{
            public function StorageTraitUpload($request,$fieldName,$folder){
                if($request->hasFile($fieldName)){
                        // lấy dữ liệu filedName
                        // lấy tên origin 
                        // Tạo hashName
                        // lưu ảnh vào storage 
                        // xuất data cần thiết 
                        $file = $request->$fieldName;
                        $fileNameOrigin = $file->getClientOriginalName();
                        $fileHashName = Str::random(20).'.'.$file->getClientOriginalExtension();
                        $filePath = $file->storeAs('public/'.$folder.'/'.auth()->id(),$fileHashName);
                        $dataUpload = [
                            'file_name' => $fileNameOrigin,
                            'file_path' => Storage::url($filePath),
                        ];
                        return $dataUpload;
                    }
                    return null;
            }

            public function StorageTraitUploadMultiple($file,$folder){
                $fileNameOrigin = $file->getClientOriginalName();
                $fileHashName = Str::random(20).'.'.$file->getClientOriginalExtension();
                $filePath = $file->storeAs('public/'.$folder.'/'.auth()->id(),$fileHashName);
                $dataUpload = [
                    'file_name' => $fileNameOrigin,
                    'file_path' => Storage::url($filePath),
                ];
                return $dataUpload;
            }
    }

