@extends('layouts.layout')

@section('title', 'create')
@section('icon', 'icon_genius')
@section('page_header', 'Create Role')

@section('content')
    {!! Breadcrumbs::render('role.create') !!}
    {!! Form::open(array('route' => 'role.store','method'=>'POST', 'class' => 'customize-form col-md-12 col-lg-5')) !!}
    @include('roles.role_form')
    {!! Form::close() !!}
@endsection