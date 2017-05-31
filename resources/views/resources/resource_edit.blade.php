@extends('layouts.layout')

@section('title', 'edit')
@section('icon', 'icon_genius')
@section('page_header', 'Edit Role Action')

@section('content')
    {!! Breadcrumbs::render('resource.edit', $roleAction['role_action_id']) !!}
    {!! Form::model($roleAction, ['method' => 'PATCH','route' => ['resource.update', $roleAction['role_action_id']], 'class' => 'customize-form col-md-12 col-lg-6']) !!}
    @include('resources.resource_form')
    {!! Form::close() !!}
@endsection