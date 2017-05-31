@extends('layouts.layout')

@section('title', 'edit')
@section('icon', 'icon_genius')
@section('page_header', 'Edit Cultural')

@section('content')
    {!! Breadcrumbs::render('cultural.edit', $cultural->id) !!}
    {!! Form::model($cultural, ['method' => 'PATCH', 'route' => ['cultural.update', $cultural->id], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'cultural-form customize-form col-md-12 col-lg-8']) !!}
        @include('Cultural.cultural_form')
    {!! Form::close() !!}
@endsection