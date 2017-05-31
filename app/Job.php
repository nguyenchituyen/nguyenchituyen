<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    public $fillable = ['name', 'description'];

    public function getTable()
    {
        return 'dtb_jobs';
    }

    public function dtb_jobs_applies()
    {
        return $this->hasMany('App\JobsApply', 'jobs_id');
    }

}
