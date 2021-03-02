<?php


namespace App\Factories;


use App\Models\Application;
use Illuminate\Support\Facades\Log;

class ApplicationFactory
{

    public static function create($name, $phone, $description, $type = 'Application')
    {
        $model = 'App\Models\\' . $type;
        if (class_exists($model)) {
            $application = new $model();
            $application->name = $name;
            $application->phone = $phone;
            $application->description = $description;
            $application->save();
            return $application;
        } else {
            Log::error("Class " . $model . " not found in ApplicationFactory");
            return false;
        }
    }
}
