<?php

use App\Models\Course;
use App\Models\GlobalConfig;
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
    $data = Course::select('name', 'slug')->where('course_type', 1)->where('status', 1)->orderBy('serial')->get();
    // dd($data);
    return  $data;
}
function getMenuSkillDevelopments()
{
    $data = Course::select('name', 'slug')->where('course_type', 2)->where('status', 1)->orderBy('serial')->get();
    // dd($data);
    return  $data;
}
function getAllSessions()
{
    $data = [];
    $year = (int) date('Y');
    for ($i = $year; $i > 2015; $i--) {
        array_push($data, $i . '-' . $i + 1);
    }
    return  $data;
}
function getAllSemesters()
{
    $data = [];
    for ($i = 1; $i < 9; $i++) {
        $suffix = match ($i) {
            1 => 'st',
            2 => 'nd',
            3 => 'rd',
            default => 'th',
        };
        $data[$i] = "{$i}{$suffix} Semester";
    }
    return $data;
}
function getSemester($number)
{
    $data = '';
    for ($i = 1; $i < 9; $i++) {
        $suffix = match ($i) {
            1 => 'st',
            2 => 'nd',
            3 => 'rd',
            default => 'th',
        };
        if ($i == $number) {
            $data = "{$i}{$suffix} Semester";
        }
    }
    return $data;
}
function getGlobalConfig($key)
{
    $data = GlobalConfig::where('key', $key)->first();
    return $data ? $data->value : null;
}

function allApplicationStatus()
{
    $arr = [
        0 => ['Cancel', 'bg-danger'],
        1 => ['Applied', 'bg-info'],
        2 => ['Approved', 'bg-success'],
    ];
    return $arr;
}
function getApplicationStatus($number)
{
    $data = '';

    $arr = allApplicationStatus();
    if (isset($arr[$number])) {
        $data = $arr[$number][0];
    }
    return $data;
}
function getApplicationStatusBg($number)
{
    $data = '';

    $arr = allApplicationStatus();

    if (isset($arr[$number])) {
        $data = $arr[$number][1];
    }
    return $data;
}
