<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/ckeditor'), $filename);

            $url = asset('uploads/ckeditor/' . $filename);

            return response()->json(['uploaded' => true, 'url' => $url]);
        }
    }
}