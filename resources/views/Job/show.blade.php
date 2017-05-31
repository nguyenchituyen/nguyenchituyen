<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/16/2017
 * Time: 16:15
 */
?>
@extends('layouts.layout')

@section('title', 'show')
@section('icon', 'fa fa-suitcase')
@section('page_header', 'Show Job')

@section('content')
    {!! Breadcrumbs::render('job.show', $job->id) !!}
    <div class="col-md-7" id="wrapper-job-show">
        <div class="col-md-12">
            @if(!empty($job->images))
                <img src="{{URL::to($job->images)}}" class="img-responsive" style="max-height: 500px;">
            @endif
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-xs-3"><strong>JobID:</strong></div>
                <div class="col-md-10 col-xs-9">{{ $job->id }}</div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-xs-3"><strong>JobName:</strong></div>
                <div class="col-md-10 col-xs-9">{{ $job->name }}</div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-xs-3"><strong>Job Alias:</strong></div>
                <div class="col-md-10 col-xs-9">{{ $job->alias }}</div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-xs-3"><strong>Tags:</strong></div>
                <div class="col-md-10 col-xs-9">{{$tags}}</div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 message-title"><strong>Job Introduce:</strong></div>
                <div class="col-md-12">{{ $job->introduce }}</div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 message-title"><strong>Job Description:</strong></div>
                <div class="col-md-12">{!! $job->description !!}</div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 job-show-btn">
            <a class="btn-back btn btn-primary" href="{{ route('job.index') }}"> Back</a>
        </div>
    </div>
@endsection
