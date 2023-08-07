<?php
    namespace App\Traits;
    use Log;
    trait DeleteModelTrait{
        public function deleteModelTrait($model,$id){
            try{
                $model->find($id)->delete();
                return response()->json([
                    "message" => "Success",
                    "code" => "200",
                ],200);
            }catch(\Exception $exception){
                Log::error("message: " .$exception->getMessage()."--- Line: ".$exception->getLine());
                return response()->json([
                    "message" => "Fail",
                    "code" => "500",
                ],500);
            }
        }   
    }