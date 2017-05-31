<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobsApply extends Model
{
    protected $table = 'dtb_jobs_applies';

    public function dtb_jobs ()
    {
        return $this->belongsTo('App\Job','jobs_id','id');
    }
}
