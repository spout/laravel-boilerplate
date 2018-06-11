<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Auth;

class Elfinder
{
    public static function checkAccess($attr, $path, $data, $volume) {
        if (!Auth::check()) {
            return false;
        }

        return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
            ? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
            :  null;                                    // else elFinder decide it itself
    }
}
