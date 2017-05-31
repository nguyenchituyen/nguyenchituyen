@extends('layouts.layout')
@section('title', 'create')
@section('icon', 'fa fa-suitcase')
@section('page_header', 'Create Cultural')

@section('content')
    {!! Breadcrumbs::render('cultural.create') !!}
    {!! Form::open(array('route' => 'cultural.store','method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'cultural-form customize-form col-md-12 col-lg-8')) !!}
    @include('Cultural.cultural_form')
    {!! Form::close() !!}
@endsection