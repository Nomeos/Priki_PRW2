<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Reference extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'description'
    ];

    public static function validateUrl($request): bool
    {
        $validation = Validator::make($request, ["url" => "regex:/^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:\/?#[\]@!\$&'\(\)\*\+,;=.]+$/"]);
        if ($validation->fails()) {
            return false;
        }
        return true;
    }

    public static function validateDescription($request): bool
    {
        $length = preg_match_all('/[^ ]/', $request->get('text'));
        if ($length <= 9) {
            return false;
        }
        return true;
    }

    public static function checkReferenceExist($request): bool
    {
        $reference = Reference::where('url', '=', $request->get('url'))->first();
        if ($reference === null) {
            return false;
        }
        return true;
    }

}
