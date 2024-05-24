<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Settings
{
    public static function setTheme(Request $req)
    {
        Setting::where('id',1)->update(['theme'=>$req->theme]);
        return 'done';
    }


    public static function getTheme()
    {
        $theme = Setting::where('id',1)->value('theme');
        return $theme;
    }
}
