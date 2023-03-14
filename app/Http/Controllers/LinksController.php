<?php

namespace App\Http\Controllers;

use App\Models\Links;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LinksController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function create_link(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'original_link' => 'required|string|max:255',
        ], ['required' => 'Заполните поле', 'max' => 'Превышено кол-во символов',]);

        if (!$validator->validate()) {
            return response()->json($validator->errors());
        }
        if ($link = Links::select('generated_link')->where('original_link', $request->original_link)->first()) {
            return response($link);
        } else {
            $link = new Links();
            $link->original_link = $request->original_link;

            do {
                $generated_link = 'http://links/' . Str::random(30);
            } while (Links::select('generated_link')->where('generated_link', $generated_link)->first());

            $link->generated_link = $generated_link;
            $link->save();
            return response($link);
        }
    }

    public function redirect_link($url)
    {
        if ($url) {
            if ($link = Links::select('original_link')->where('generated_link', $url)->first()) {
                return redirect($link);
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }
}
