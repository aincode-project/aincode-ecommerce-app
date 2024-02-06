<?php

function handleUpload($inputName, $fileLocation, $model=null)
{
    try {
        if (request()->hasFile($inputName)) {
            if ($model && \File::exists(public_path($model->{$inputName}))) {
                \File::delete(public_path($model->{$inputName}));
            }

            $file = request()->file($inputName);
            $ext = $file->getClientOriginalExtension();
            $fileName = 'media_'.uniqid().'.'.$ext;

            $fileLocation = trim($fileLocation, '/') . '/';
            $file->move(public_path("/uploads/{$fileLocation}"), $fileName);

            $filePath = "/uploads/{$fileLocation}{$fileName}";

            return $filePath;
        }
    } catch (\Exception $e) {
        throw $e;
    }
}

function handelDelete(string $filePath)
{
    if (\File::exists(public_path($filePath))) {
        \File::delete(public_path($filePath));
    }
}
