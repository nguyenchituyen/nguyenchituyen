<?php

namespace App\Http\Controllers;

use App\JobsApply;
use DB;
use App\Tags;
use App\Job;
use App\JobsTags;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\JobName;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use DateTime;
use File;
use Response;

class JobsController extends Controller
{
    protected $urlUploadImage;

    /*
     * Display listing of resource
     *
     * @return \Illuminate\Http\Response
     * */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $itemNumber = 10;
        if ($request->page == null || $request->page == 1) {
            $orderNumber = 1;
        } else {
            $orderNumber = $request->page * $itemNumber - ($itemNumber - 1);
        }

        $searchTitle = $request->input('search_title');
        if (!empty($searchTitle) || $searchTitle == null) {
            $keySearchTitle = preg_split("/[\s,]+/", "$searchTitle");
            $query = DB::table('dtb_jobs as j');
            foreach ($keySearchTitle as $wordTitle) {
                $query->orWhere('j.name', 'like', '%' . $wordTitle . '%');
            }
            $jobs = $query->leftJoin('dtb_users as u', 'u.id', '=', 'j.staff_id')
                ->select([
                    'j.id',
                    'u.name as staff_name',
                    'j.name as title',
                    'j.images',
                    'j.views',
                    'j.created_at'
                ])->where('j.del_flg', '=', 0)
                ->orderBy('j.id', 'DESC')
                ->paginate($itemNumber);
        }

        return view('Job.index', compact('jobs', 'orderNumber'));
    }

    public function create()
    {
        $tags = Tags::select('id', 'name')
            ->where('del_flg', 0)
            ->get();

        return view('Job.create', ['tags' => $tags]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $fileName = $this->uploadImage("images");
        $tags = $request->tags;
        $staffId = Auth::user()->id;
        $jobId = Job::insertGetId([
            'name' => $request->name,
            'alias' => $request->alias,
            'introduce' => $request->introduce,
            'description' => $request->description,
            'images' => $fileName,
            'staff_id' => $staffId,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $this->updateJobTag($jobId, $tags);

        return redirect()->route('job.index')->with('success', 'The create successful');
    }

    public function show($id)
    {
        $job = Job::find($id);
        $jobsTags = JobsTags::leftJoin('dtb_tags as t', 'dtb_jobs_tags.tag_id', '=', 't.id')
            ->select('t.id', 't.name')
            ->where('job_id', $id)
            ->get();
        $selected = array();
        $tagsConvert = $jobsTags->toArray();
        foreach ($tagsConvert as $tagId) {
            array_push($selected, $tagId['id']);
        }
        $tags = Tags::select('id', 'name')->where('del_flg', 0)->whereIn('id', $selected)->get();
        $tags = $tags->map(function ($value) {    
            return $value['name'];
        })->toArray();
        $tags = implode(' - ', $tags);

        return view('Job.show', ['job' => $job, 'tags' => $tags, 'selected' => $selected]);
    }

    public function edit($id)
    {
        $job = Job::find($id);
        $jobsTags = JobsTags::leftJoin('dtb_tags as t', 'dtb_jobs_tags.tag_id', '=', 't.id')
            ->select('t.id', 't.name')
            ->where('job_id', $id)
            ->get();
        $selected = array();
        $tagsConvert = $jobsTags->toArray();
        foreach ($tagsConvert as $tagId) {
            array_push($selected, $tagId['id']);
        }

        $tags = Tags::select('id', 'name')->where('del_flg', 0)->get();

        return view('Job.edit', ['job' => $job, 'tags' => $tags, 'selected' => $selected]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $tags = $request->tags;
        $this->updateJobTag($id, $tags);

        $fileName = $this->uploadImage("images");
        if ($fileName != null) {
            $arr['images'] = $fileName;
        }
        $staffId = Auth::user()->id;
        $arr['name'] = $request->name;
        $arr['alias'] = $request->alias;
        $arr['introduce'] = $request->introduce;
        $arr['description'] = $request->description;
        $arr['staff_id'] = $staffId;
        $arr['updated_at'] = date('Y-m-d H:i:s');
        Job::where('id', $id)->update($arr);

        return redirect()->route('job.index')->with('success', 'The update successful');
    }

    public function destroy($id)
    {
        $job = Job::find($id);
        $job->del_flg = 1;
        $job->save();

        return redirect()->route('job.index')->with('success', 'Job deleted successfully');
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
            $destinationPath = public_path() . '/' . $this->urlUploadImage . '/jobs/' . $yearMonth . '/';
            $extension = $file->getClientOriginalExtension();
            $newName = date('Ymd_His');
            $file->move($destinationPath, $newName . '.' . $extension);
            $fileName = '/uploads/jobs/' . $yearMonth . '/' . $newName . '.' . $extension;
            return $fileName;
        }
    }

    /*
     * @param : jobId is interger
     * @param : tags is array
     * */
    private function updateJobTag($jobId, $tags)
    {
        if ($tags != null) {
            $checkJob = JobsTags::select('job_id', 'tag_id')
                ->where('job_id', $jobId)
                ->get();
            $countCheckJob = count($checkJob->toArray());
            if ($countCheckJob == 0) {
                foreach ($tags as $tagId) {
                    JobsTags::insert([
                        'job_id' => $jobId,
                        'tag_id' => $tagId,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            } else {
                /*
                 * todo: this function delete id exist and insert new jobs and tags in dtb_jobs_tags
                 *
                 * */
                JobsTags::where('job_id', '=', $jobId)->delete();

                foreach ($tags as $tagId) {
                    JobsTags::insert([
                        'job_id' => $jobId,
                        'tag_id' => $tagId,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            }
        }
    }

    public function multiCheckboxes(Request $request)
    {
        $idJobs = explode(',', $request->id);
        foreach ($idJobs as $idJob) {
            $job = Job::find($idJob);
            $job->del_flg = 1;
            $job->save();
        }
        
    }

    public function createTag()
    {
        return view('Job.tag_create');
    }

    public function storeTag(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $tag = new Tags;
        $tag->name = $request->name;
        $tag->alias = $request->alias;
        $tag->created_at = date('Y-m-d H:i:s');
        $tag->updated_at = date('Y-m-d H:i:s');
        $tag->save();

        return redirect()->route('job.indexTag')->with('success', 'Role updated successfully');
    }

    public function indexTag(Request $request)
    {
        $itemNumber = 5;
        if ($request->page == null || $request->page == 1) {
            $orderNumber = 1;
        } else {
            $orderNumber = $request->page * $itemNumber - ($itemNumber - 1);
        }

        $searchTitle = $request->input('search_title');

        if (!empty($searchTitle) || $searchTitle == null) {
            $keySearchTitle = preg_split("/[\s,]+/", "$searchTitle");
            $query = DB::table('dtb_tags as t');
            foreach ($keySearchTitle as $wordTitle) {
                $query->orWhere('t.name', 'like', '%' . $wordTitle . '%');
            }
            $tags = $query->select([
                't.id',
                't.name',
                't.alias',
                't.created_at',
                't.updated_at'
            ])->where('t.del_flg', '=', 0)
                ->orderBy('t.id', 'DESC')
                ->paginate($itemNumber);
        }
        return view('Job.tag_index', ['tags' => $tags, 'orderNumber' => $orderNumber]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function updateTag(Request $request, $id)
    {
        //Validation
        $this->validate($request, [
            'name' => 'required',
        ]);
        $tag = Tags::find($id);
        $tag->name = $request->name;
        $tag->alias = $request->alias;
        $tag->created_at = date('Y-m-d H:i:s');
        $tag->updated_at = date('Y-m-d H:i:s');
        $tag->save();

        return redirect()->route('job.indexTag')->with('success', 'Tags updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function editTag($id)
    {
        $tag = Tags::find($id);

        return view('job.tag_edit', compact('tag'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyTag($id)
    {
        $tag = Tags::find($id);
        $tag->delete();

        return redirect()->route('job.indexTag');
    }
    /*
     * @return : list job applied
     * */
    public function jobsApply (Request $request)
    {
        $itemNumber = 5;
        if ($request->page == null || $request->page == 1) {
            $orderNumber = 1;
        } else {
            $orderNumber = $request->page * $itemNumber - ($itemNumber - 1);
        }

        $jobApply = JobsApply::orderBy('id', 'DESC')->paginate($itemNumber);
        return view('job.apply', compact('jobApply', 'orderNumber'))->with('jobApply', JobsApply::paginate($itemNumber));
    }

    /*
     * @return : list search job applied
     * */
    public function searchApplyForJob (Request $request)
    {
        $name = $request->input('search');
        $jobApply = JobsApply::with('dtb_jobs')->orderBy('name', 'asc')
            ->whereHas('dtb_jobs', function($query) use ($name){
                $query->where('dtb_jobs.name', 'LIKE', '%'.$name.'%');
            })->orWhere('dtb_jobs_applies.name', 'LIKE', '%'.$name.'%')
            ->orWhere('dtb_jobs_applies.email', 'LIKE', '%'.$name.'%')->paginate(5);

        return view('job.apply', compact('jobApply'));
    }

    /*
     * @param : id of job apply
     * @return : show info job applied
     * */
    public function showJobApply($id)
    {
        $jobApply = DB::table('dtb_jobs_applies')->join('dtb_jobs', 'dtb_jobs.id', '=',
            'dtb_jobs_applies.jobs_id')->where('dtb_jobs_applies.id', $id)->select('dtb_jobs_applies.*',
            'dtb_jobs.id as jobId', 'dtb_jobs.name as nameJob')->get();

        return view('job.show_apply')->with('jobApply', $jobApply);
    }

    /*
     * @param : id of job apply
     * @return : delete info job applied
     * */
    public function deleteApply ($id)
    {
        $jobApply = JobsApply::findOrfail($id);
        $jobApply->delete();
        return redirect('job/apply');
    }
}
