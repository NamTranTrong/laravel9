<?php 

namespace App\Traits;
use Log;

trait DeleteTrait
{
    public function deleteModelTrait($id,$model){
        try {
            $model->find($id)->delete();
            return response()->json([
                "massage" => "Success",
                "code" => "200",
            ],200);
        } catch (\Exception $e) {
            Log::error('Error deleting categories', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Server error occurred.'], 500);
        }
    }
}