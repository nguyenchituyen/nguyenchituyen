@extends('layouts.layout')

@section('title', 'edit')
@section('icon', 'icon_document_alt')
@section('page_header', 'Edit User')

@section('content')
    {!! Breadcrumbs::render('user.edit', $user['id']) !!}

    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['user.update', $user['id']], 'class' => 'customize-form col-md-12 col-lg-6']) !!}
    @include('users.user_form')
    {!! Form::close() !!}
@endsection