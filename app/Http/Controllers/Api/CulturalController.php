<?php

namespace App\Http\Controllers\Api;

use App\Cultural;
use Illuminate\Support\Facades\DB;

class CulturalController extends ApiController
{
    public function culturalInfo($id) {
        $cultural = Cultural::select(
            'id', 'title', 'description', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6', 'image_7',
            DB::raw("DATE_FORMAT(updated_at, '%M %w, %Y') as date_created"))
        ->where('del_flg', '=', 0)->orderBy('created_at', 'desc')->take(3)->offset($id)->get();

        return response()->json([
            'cultural' => $cultural,
        ]);
    }

    public function culturalDetail($id) {
        $cultural = Cultural::select(
            'id', 'title', 'description', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6', 'image_7',
            DB::raw("DATE_FORMAT(updated_at, '%M %w, %Y') as date_created"))
            ->where([['del_flg', '=', 0], ['id', '=', $id]])->get();

        return response()->json([
            'cultural' => $cultural,
        ]);
    }
}