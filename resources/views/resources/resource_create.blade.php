@extends('layouts.layout')

@section('title', 'create')
@section('icon', 'icon_genius')
@section('page_header', 'Create Role Action')

@section('content')
    {!! Breadcrumbs::render('resource.create') !!}
    {!! Form::open(array('route' => 'resource.store','method'=>'POST', 'class' => 'customize-form col-md-12 col-lg-6')) !!}
    @include('resources.resource_form')
    {!! Form::close() !!}
@endsection