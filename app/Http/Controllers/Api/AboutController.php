<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

class AboutController extends ApiController
{
    public function aboutUs()
    {
        $about = DB::table('dtb_abouts')->select('title', 'contents')->get();

        return response()->json([
            'status' => 'success',
            'about' => $about
        ]);
    }
}