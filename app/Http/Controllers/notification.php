<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notification extends Controller
{
    public static function displayMessage($type="default",$message){
        switch($type){
            case "success":
                notify()->success($message);
            break;
            case "error": 
                notify()->error($message);
            break;
            default:
                smilify('success', $message);
            break;
        }
        
    }
}
