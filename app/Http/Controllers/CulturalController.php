<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Cultural;

use Illuminate\Support\Facades\Input;

use App\Image;

use Validator;

use DateTime;
use File;

class CulturalController extends Controller
{
    protected $urlUploadImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemNumber = 10;
        if ($request->page == null || $request->page == 1) {
            $orderNumber = 1;
        } else {
            $orderNumber = $request->page * $itemNumber - ($itemNumber - 1);
        }

        $searchTitle = $request->input('search_title');
        $query = DB::table('dtb_cultural as cd');

        $keySearchTitle = array('');
        if ($searchTitle != '') {
            $keySearchTitle = preg_split("/[\s,]+/", "$searchTitle");
            foreach ($keySearchTitle as $wordTitle) {
                $query->orWhere('title', 'like', '%' . $wordTitle . '%');
            }
        }

        $culturals = $query->select('cd.id', 'cd.title', 'cd.created_at', 'cd.updated_at')
            ->where('cd.del_flg', '=', 0)
            ->orderBy('cd.id', 'DESC')
            ->paginate($itemNumber);
        return view('Cultural.cultural_index', compact('culturals', 'keySearchTitle', 'orderNumber'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cultural.cultural_create');
    }

    /*This method relates to the "image detail" view */
    public function show($id)
    {
        $cultural = Cultural::find($id);
        return view('Cultural.cultural_show', compact('cultural'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $cultural = new Cultural;
        $fileName1 = $this->uploadImage('image_1');
        $fileName2 = $this->uploadImage('image_2');
        $fileName3 = $this->uploadImage('image_3');
        $fileName4 = $this->uploadImage('image_4');
        $fileName5 = $this->uploadImage('image_5');
        $fileName6 = $this->uploadImage('image_6');
        $fileName7 = $this->uploadImage('image_7');
        $cultural->title = $request->title;
        $cultural->description = $request->description;
        $cultural->image_1 = $fileName1;
        $cultural->image_2 = $fileName2;
        $cultural->image_3 = $fileName3;
        $cultural->image_4 = $fileName4;
        $cultural->image_5 = $fileName5;
        $cultural->image_6 = $fileName6;
        $cultural->image_7 = $fileName7;
        $cultural->created_at = new DateTime();
        $cultural->save();
        return redirect()->route('cultural.index')->with('success', 'Cultural created successfully');
    }

    /*
     * @param: inputName is string
     * */
    protected function uploadImage($inputName)
    {
        $this->urlUploadImage = 'uploads';
        if (Input::hasFile($inputName)) {
            $file = Input::file($inputName);
            $yearMonth = date('Ym');
            $destinationPath = public_path() . '/' . $this->urlUploadImage . '/cultural/' . $yearMonth . '/';
            $newName = $file->getClientOriginalName();
            $file->move($destinationPath, $newName);
            $fileName = '/uploads/cultural/' . $yearMonth . '/' . $newName;
            return $fileName;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cultural = Cultural::find($id);
        return view('Cultural.cultural_edit', [
            'cultural' => $cultural
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validation
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $fileName1 = $this->uploadImage('image_1');
        $fileName2 = $this->uploadImage('image_2');
        $fileName3 = $this->uploadImage('image_3');
        $fileName4 = $this->uploadImage('image_4');
        $fileName5 = $this->uploadImage('image_5');
        $fileName6 = $this->uploadImage('image_6');
        $fileName7 = $this->uploadImage('image_7');

        $cultural = Cultural::find($id);
        if ($request->title != null) {
            $cultural->title = $request->title;
        }

        if ($request->description != null) {
            $cultural->description = $request->description;
        }

        if ($fileName1 != null) {
            $cultural->image_1 = $fileName1;
        }

        if ($fileName2 != null) {
            $cultural->image_2 = $fileName2;
        }

        if ($fileName3 != null) {
            $cultural->image_3 = $fileName3;
        }

        if ($fileName4 != null) {
            $cultural->image_4 = $fileName4;
        }

        if ($fileName5 != null) {
            $cultural->image_5 = $fileName5;
        }

        if ($fileName6 != null) {
            $cultural->image_6 = $fileName6;
        }

        if ($fileName7 != null) {
            $cultural->image_7 = $fileName7;
        }
        $cultural->save();

        return redirect()->route('cultural.index')->with('success', 'Cultural updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cultural = Cultural::find($id);
        $cultural->delete();
        return redirect()->route('cultural.index');
    }
}
