<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


trait StorageImageTrait
{
    public function storageTraitUpload(Request $request, $fieldName, $folderName)
    {

        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            //$fileNameHash = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filepath = $request->file($fieldName)->storeAs('public/' . $folderName, $fileNameOrigin);

            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filepath),
            ];
            return $dataUploadTrait;
        } else
            return [];

    }

    public function storageTraitUploadMultiple($file, $folderName)
    {

        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash =  Str::random(10) . '.' . $file->getClientOriginalExtension();

        $filepath = $file->storeAs('public/' . $folderName , $fileNameHash);

        $dataUploadTrait = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filepath),
        ];
        return $dataUploadTrait;
    }
}
