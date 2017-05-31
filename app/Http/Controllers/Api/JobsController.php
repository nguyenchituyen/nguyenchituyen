<?php

namespace App\Http\Controllers\Api;

use App\Job;
use App\JobsApply;
use App\JobsTags;
use App\Tags;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Http\Request;
use Mail;

class JobsController extends ApiController
{
    /*
     * API for jobs detail
     * @param id interger
     * */
    public function jobsDetail ($alias)
    {
        if ($alias != null) {
            $jobInfor = Job::select(
                'id',
                'name',
                'alias',
                'introduce',
                'description',
                'images',
                'views',
                DB::raw("DATE_FORMAT(updated_at, '%M %w, %Y') as date_created"))
            ->where('del_flg', 0)
            ->where('alias', $alias)->get();

            $jobOther = Job::select(
                'id',
                'name',
                'images',
                'alias',
                DB::raw("DATE_FORMAT(updated_at, '%M %w, %Y') as date_created"))
            ->where('del_flg', 0)
            ->where('alias', '!=', $alias)
            ->orderBy('updated_at', 'DESC')->get();

            $jobTagInfor = JobsTags::select([
                'tag_id'
            ])->where('job_id', $jobInfor->first()->id)->get();

            $listTags = Tags::select([
                'id',
                'name',
                'alias',
            ])->get();
        }

        return response()->json([
            'jobs' => $jobInfor,
            'jobsOther' => $jobOther,
            'jobsTags' => $jobTagInfor,
            'listTags' => $listTags
        ]);
    }

    /*
     * API for all Jobs
     * */
    public function jobsList ($tagAlias = "")
    {
        if ($tagAlias !== "") {
            $jobInfor = Job::select(
                "dtb_jobs.id",
                "dtb_jobs.name",
                "dtb_jobs.alias",
                "dtb_jobs.introduce",
                "dtb_jobs.images",
                "dtb_jobs.views",
                DB::raw("DATE_FORMAT(dtb_jobs.updated_at, '%M %w, %Y') as date_created"))
            ->leftJoin('dtb_jobs_tags AS jt', 'dtb_jobs.id', '=', 'jt.job_id')
            ->leftJoin('dtb_tags AS t', 'jt.tag_id', '=', 't.id')
            ->orderBy('dtb_jobs.updated_at', 'DESC')
            ->where([
                ['t.alias', '=', $tagAlias],
                ['dtb_jobs.del_flg', '=', 0]
            ])->paginate(8);
        } else {
            $jobInfor = Job::select(
                "id",
                "name",
                "alias",
                "introduce",
                "images",
                "views",
                DB::raw("DATE_FORMAT(updated_at, '%M %w, %Y') as date_created"))
            ->orderBy('updated_at', 'DESC')
            ->where('del_flg', 0)->paginate(8);
        }

        return response()->json([
            'jobs' => $jobInfor
        ]);
    }

    /*
     * API for Jobs Apply
     * */
    public function jobsApply (Request $request)
    {
        $file = $request->file('filename');
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'recommend' => $request->recommend,
            'mailto' => config('mail.from.address'),
            'jobs_id' => $request->jobs_id
        );

        $validator = Validator::make($request->all(), [
            'filename'   => ['mimes:doc,pdf,docx']
        ]);

        if ($request->hasFile('filename')) {
            $data['path'] = base_path() . '/public/uploads';
            $data['filename'] = $data['name'] . '_' . time() . '_' . $file->getClientOriginalName();
            if ($validator->fails()) {
                return response()->json(['error'=>'2','status'=>'fail']);
            } else {
                $backUpDir = $data['path'];
                system("mkdir -p $backUpDir");
                $request->file('filename')->move($data['path'], $data['filename']);
            }
        } else {
            return response()->json(['error'=>'3','status' => 'fail']);
        }

        $jobApply = JobsApply::where([
            ['email', '=',$data['email']],
            ['jobs_id', '=', $data['jobs_id']]
        ])->first();

        if ($jobApply) {
            unlink(base_path() . '/public/uploads/' . $jobApply['file']);
            $jobApply->where([
                ['email', '=',$data['email']],
                ['jobs_id', '=', $data['jobs_id']]
            ]);
            $jobApply->name = $data['name'];
            $jobApply->file = $data['filename'];
            $jobApply->recommend = $data['recommend'];
        } else {
            $jobApply = new JobsApply();
            $jobApply->name = $data['name'];
            $jobApply->email = $data['email'];
            $jobApply->file = $data['filename'];
            $jobApply->recommend = $data['recommend'];
            $jobApply->jobs_id = $data['jobs_id'];
        }

        $result = $jobApply->save();

        if ($result) {
            Mail::send('emails.jobs_apply', $data, function($message) use ($data) {
                $message->to($data['mailto'],$data['name']);
                $message->subject('There is new candidate !!!');
                $message->replyTo($data['email'], $data['name']);
                $message->attach($data['path'].'/'.$data['filename']);
            });
            return response()->json(["error"=>'0',"status"=>"success"]);
        }else {
            return response()->json(["error"=>'1',"status"=>"fail"]);
        }

    }
}