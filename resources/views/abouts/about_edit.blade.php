@extends('layouts.layout')

@section('title', 'edit')
@section('icon', 'icon_piechart')
@section('page_header', 'Edit About')

@section('content')
    {{--{!! Breadcrumbs::render('role.edit', $role->id) !!}--}}
    {!! Form::model($about, ['method' => 'PATCH', 'route' => ['about.update', $about->id], 'class' => 'customize-form col-md-12 col-lg-8']) !!}
    @include('abouts.about_form')
    {!! Form::close() !!}
@endsection