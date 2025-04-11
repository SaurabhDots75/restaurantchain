<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Storage;

trait ImageUpload {

    public function upload(Request $request, $fieldname = 'image', $directory = 'images',$deleteImageFollder = '') {
        if( $request->hasFile( $fieldname ) ) {
            if ($request->file($fieldname)->isValid()) {
                $extension              = $request->file($fieldname)->getClientOriginalExtension();
                $fileName               = time() . '-image.' . $extension;
                $folderName             = strtoupper(date('M') . date('Y')) . "/";
                $folderPath             = $directory .$folderName;
                if($deleteImageFollder != ''){
                    $deleteFolderPath       = $directory.$deleteImageFollder;
                    if(Storage::disk('public')->exists($deleteFolderPath)) {
                        Storage::disk('public')->delete($deleteFolderPath);
                    }
                }
                if (Storage::disk('public')->putFileAs($folderPath,$request->file($fieldname),$fileName, 'public')) {
                    return $folderName . $fileName;
                }
            }
        }else{
            if($deleteImageFollder != ''){
                return $deleteImageFollder; 
            }
        }
        return null;
    }
    public function imageDeleted($directory = 'images',$deleteImageFollder = '') {
        if($deleteImageFollder != ''){
            $deleteFolderPath   = $directory.$deleteImageFollder;
            if(Storage::disk('public')->exists($deleteFolderPath)) {
                Storage::disk('public')->delete($deleteFolderPath);
            }
        }
        return 'success';
    }
}
