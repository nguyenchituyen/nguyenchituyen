@extends('layouts.layout')

@section('title', 'create')
@section('icon', 'icon_document_alt')
@section('page_header', 'Create User')

@section('content')
    {!! Breadcrumbs::render('user.create') !!}
    {!! Form::open(array('route' => 'user.store','method'=>'POST', 'class' => 'customize-form col-md-12 col-lg-6')) !!}
    @include('users.user_form')
    {!! Form::close() !!}
@endsection