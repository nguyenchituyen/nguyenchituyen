@extends('layouts.layout')

@section('title', 'edit')
@section('icon', 'icon_genius')
@section('page_header', 'Edit Role')

@section('content')
    {!! Breadcrumbs::render('role.edit', $role->id) !!}
    {!! Form::model($role, ['method' => 'PATCH','route' => ['role.update', $role->id], 'class' => 'customize-form col-md-12 col-lg-5']) !!}
    @include('roles.role_form')
    {!! Form::close() !!}
@endsection