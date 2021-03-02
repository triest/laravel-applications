<?php

namespace App\Models;


use Illuminate\Support\Facades\Storage;

class File implements BaseApplication
{

    public function save()
    {
        $contents = "Имя:" . $this->name . "\n";
        $contents .= "Телефон:" . $this->phone . "\n";
        $contents .= "Обращение:\n" . $this->description;
        $name = $this->name . '-' . date('Y-m-d-H-i-s');
        $patch = $name . '.txt';
        $loop = Storage::exists($patch);
        while ($loop) {
            $name .= '(1)';
            $patch .= $name . '.txt';
            $loop = Storage::exists($patch);
        }

        Storage::put($patch, $contents);
    }
}
