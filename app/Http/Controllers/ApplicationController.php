<?php

namespace App\Http\Controllers;

use App\Factories\ApplicationFactory;
use App\Http\Requests\ApplicationRequest;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    //

    public function store(ApplicationRequest $request)
    {
        //type:File,Application,Email
        $model = ApplicationFactory::create($request->name, $request->phone, $request->description, 'File');
        if (!$model) {
            return response()->json(
                    [
                            "message" => "Server Error",
                            "errors" => "Внутренняя ошибка. Повторите позже"
                    ],
                    500
            );
        }

        return response('', '201');
    }
}
