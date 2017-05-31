<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/16/2017
 * Time: 16:03
 */
?>

@extends('layouts.layout')

@section('title', 'create')
@section('icon', 'fa fa-suitcase')
@section('page_header', 'Create Job')

@section('content')
    {!! Html::style('css/job_style.css')!!}
    {!! Breadcrumbs::render('job.create') !!}
    {!! Form::open(array('route' => 'job.store','method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'customize-form col-md-12 col-lg-8')) !!}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="form-group">
                    <strong>Job Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Job Name','class' => 'form-control', 'id' => 'name')) !!}
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-lg-8">
                <div class="form-group">
                    <strong>Job Alias:</strong>
                    {!! Form::text('alias', null, array('placeholder' => 'Job Alias','class' => 'form-control', 'id' => 'alias')) !!}
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong style="display: block;">Tags:</strong>
                    <select multiple name="tags[]" class="col-md-2 col-sm-3 col-xs-4 select-multiple">
                        @foreach($tags as $key => $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="form-group img-job-create">
                    <strong>Upload Image:</strong>
                    {!! Form::file('images', array('id' => 'image_input'))!!}
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Job Introduce:</strong>
                    {!! Form::textarea('introduce', null, array('placeholder' => 'Job Introduce','class' => 'form-control','style'=>'height:70px', 'id' => 'introduce')) !!}
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Job Description:</strong>
                    {!! Form::textarea('description', null, array('placeholder' => 'Job Description','class' => 'form-control','style'=>'height:100px', 'id' => 'description')) !!}
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn-submit btn btn-primary">Submit</button>
                <a class="btn-back btn btn-default" href="{{ route('job.index') }}"> Back</a>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection



