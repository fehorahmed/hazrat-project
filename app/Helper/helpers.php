<?php

use App\Models\Course;
use App\Models\DevelopmentCourse;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

function saveImage($destination, $attribute, $width = null, $height = null): string
{
    if (!File::isDirectory(base_path() . '/public/uploads/' . $destination)) {
        File::makeDirectory(base_path() . '/public/uploads/' . $destination, 0777, true, true);
    }

    if ($attribute->extension() == 'svg') {
        $file_name = time() . '-' . $attribute->getClientOriginalName();
        $path = 'uploads/' . $destination . '/' . $file_name;
        $attribute->move(public_path('uploads/' . $destination . '/'), $file_name);
        return $path;
    }

    $img = Image::make($attribute);
    if ($width != null && $height != null && is_int($width) && is_int($height)) {
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
    }

    $returnPath = 'uploads/' . $destination . '/' . time() . '-' . Str::random(10) . '.' . $attribute->extension();
    $savePath = base_path() . '/public/' . $returnPath;
    $img->save($savePath);
    return $returnPath;
}


function saveFile($destination, $attribute): string
{
    if (!File::isDirectory(base_path() . '/public/uploads/' . $destination)) {
        File::makeDirectory(base_path() . '/public/uploads/' . $destination, 0777, true, true);
    }

    $file_name = time() . '-' . $attribute->getClientOriginalName();
    $path = 'uploads/' . $destination . '/' . $file_name;
    $attribute->move(public_path('uploads/' . $destination . '/'), $file_name);
    return $path;
}


function deleteFile($path)
{
    File::delete($path);
}

function getFile($file)
{
    return asset($file);
}
function getMenuCourses()
{
    $data= Course::select('name','slug')->where('status',1)->orderBy('serial')->get();
    // dd($data);
    return  $data;
}
function getMenuSkillDevelopments()
{
    $data= DevelopmentCourse::select('name','slug')->where('status',1)->orderBy('serial')->get();
    // dd($data);
    return  $data;
}
