@extends('layouts.layout')

@section('title', 'profile')
@section('icon', 'icon_document_alt')
@section('page_header', 'Profile')

@section('content')
    {!! Breadcrumbs::render('user.show', $user->id) !!}
    <div class="col-md-7" id="wrapper-job-show">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-xs-3"><strong>Name:</strong></div>
                <div class="col-md-10 col-xs-9">{{ $user->name }}</div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-xs-3"><strong>Email:</strong></div>
                <div class="col-md-10 col-xs-9">{{ $user->email }}</div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-xs-3"><strong>Password:</strong></div>
                <div class="col-md-10 col-xs-9">
                    @for ($i =0; $i < strlen($user->password); $i++)
                        <strong>*</strong>
                    @endfor
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 text-left job-show-btn">
            <a class="btn-back btn btn-primary" href="{{ route('user.index') }}"> Back</a>
        </div>
    </div>
@endsection