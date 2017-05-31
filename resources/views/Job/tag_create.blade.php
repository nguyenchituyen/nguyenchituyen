@extends('layouts.layout')

@section('title', 'create')
@section('icon', 'fa fa-suitcase')
@section('page_header', 'Create Tag')

@section('content')
    {!! Breadcrumbs::render('job.createTag') !!}
    {!! Form::open(array('route' => 'job.storeTag', 'method'=>'POST', 'enctype' => 'multipart/form-data', 'class' => 'customize-form col-md-12 col-lg-6')) !!}
    @include('Job.tag_form')
    {!! Form::close() !!}
@endsection