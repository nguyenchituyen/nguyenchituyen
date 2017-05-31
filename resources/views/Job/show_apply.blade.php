<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/16/2017
 * Time: 16:15
 */
?>
@extends('layouts.layout')

@section('title', 'show apply job')
@section('icon', 'fa fa-suitcase')
@section('page_header', 'Candidate Apply Job Detail')

@section('content')
    {!! Breadcrumbs::render('job.showJobApply', $jobApply[0]->id) !!}
    <div class="col-md-7" id="wrapper-job-show">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-xs-3"><strong>ID:</strong></div>
                <div class="col-md-10 col-xs-9">{{ $jobApply[0]->id }}</div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-xs-3"><strong>Job Name:</strong></div>
                <div class="col-md-10 col-xs-9">
                    <a href="{{ route('job.show', $jobApply[0]->jobId) }}" target="_blank">{{ $jobApply[0]->nameJob }}</a>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-xs-3"><strong>Candidate Name:</strong></div>
                <div class="col-md-10 col-xs-9">{{ $jobApply[0]->name }}</div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-xs-3"><strong>Candidate Email:</strong></div>
                <div class="col-md-10 col-xs-9">{{ $jobApply[0]->email }}</div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 message-title"><strong>Recommend:</strong></div>
                <div class="col-md-12">{{ $jobApply[0]->recommend }}</div>
            </div>
        </div>
        <hr/>
        <div class="col-md-12 text-left job-show-btn">
            <a class="btn-back btn btn-default" href="{{ route('job.apply') }}"> Back</a>
        </div>
    </div>
@endsection
