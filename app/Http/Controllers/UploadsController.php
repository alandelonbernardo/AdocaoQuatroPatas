<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadsController extends Controller
{
    public function upload(Request $request){
        try{
            $path = null;
            $data = $request->all();

            foreach($data as $key => $photo){
                $path = $this->_upload($data[$key], '/photos');
            }
        }catch(\Exception $exception){
            throw $exception;
        }

        return['file' => $path];
    }

    public function _upload($photo, $path, $width = null){
        try{
            $nameOnly = preg_replace('/\..+$/', '', $photo->getClientOriginalName());
            $store = Storage::disk('public')->putFileAs($path, $photo, $nameOnly . '.' . $photo->getClientOriginalExtension());
            return asset('/storage/' . $store);
        }catch(\Exception $ex){
            throw $ex;
        }
    }
}
