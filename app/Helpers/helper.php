
<?php

use App\Models\home;
use App\Models\User;
use App\Models\varibale;
use Illuminate\Support\Facades\Redirect;

if (!function_exists("path")) {
    function path($img)
    {
        $img = str_replace("public", "storage", $img);

        $img = asset("$img");

        return $img;
    }
}

if (!function_exists("check_Email")) {
    function check_Email($email)
    {
        $email = User::withTrashed()
            ->where("email", $email)
            ->first();


        if ($email != null) {
            return Redirect::back()
                ->withErrors("هذا البريد مسجل به من قبل")
                ->withInput();
        }

        return false;
    }
}


function home($title)
{
    return (home::where("key", $title)->first()->value)  ;
}

function variable($title)
{
    return (varibale::where("key", $title)->first()->value)  ;
}


function update_home($key , $value)
{
    home::where("key", $key )->update(["value" => $value]);

}

if (!function_exists('generateSlug')) {
    function generateSlug($productName)
    {
        $slug = strtolower($productName);
        $slug = preg_replace('/[^a-z0-9\p{L}]+/u', '-', $slug);
        $slug = trim($slug, '-');
        return $slug;
    }
}



function update_varibale($key , $value)
{

    if (is_null($value)) {
        $value = "" ;
    }


    varibale::where("key", $key )->update(["value" => $value]);

}
