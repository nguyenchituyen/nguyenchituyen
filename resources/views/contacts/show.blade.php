<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/04/2017
 * Time: 9:07 SA
 */
?>
@extends('layouts.layout')

@section('title', 'contact-show')
@section('icon', 'fa fa-suitcase')
@section('page_header', 'Show Contact')

@section('content')
    {!! Breadcrumbs::render('contact.show', $contacts->id) !!}
    <div class="col-md-7" id="wrapper-job-show">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-xs-3"><strong>Name:</strong></div>
                <div class="col-md-10 col-xs-9">{{ $contacts->name }}</div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-xs-3"><strong>Email:</strong></div>
                <div class="col-md-10 col-xs-9">{{ $contacts->email }}</div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-xs-3"><strong>Day Send:</strong></div>
                <div class="col-md-10 col-xs-9">{{ $contacts->created_at }}</div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 message-title"><strong>Message:</strong></div>
                <div class="col-md-12">{{ $contacts->message }}</div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 text-left job-show-btn">
            <a class="btn-back btn btn-primary" href="{{ route('contact.index') }}"> Back</a>
        </div>
    </div>
@endsection