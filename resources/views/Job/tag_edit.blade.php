@extends('layouts.layout')

@section('title', 'edit')
@section('icon', 'icon_genius')
@section('page_header', 'Edit Tag')

@section('content')
    {!! Breadcrumbs::render('job.editTag', $tag->id) !!}
    {!! Form::model($tag, ['method' => 'PATCH','route' => ['job.updateTag', $tag->id], 'class' => 'customize-form col-md-12 col-lg-6']) !!}
    @include('job.tag_form')
    {!! Form::close() !!}
@endsection
