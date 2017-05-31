<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/16/2017
 * Time: 16:15
 */
?>
@extends('layouts.layout')

@section('title', 'show')
@section('icon', 'fa fa-suitcase')
@section('page_header', 'Show Cultural')

@section('content')
    {!! Html::style('css/job_style.css') !!}
    {!! Breadcrumbs::render('cultural.show', $cultural->id) !!}
    <div class="col-md-7" id="wrapper-job-show" style="margin-bottom: 60px; padding-bottom: 40px">
        <div class="container">
            <div class="row wrapper-bxslider-cultural">
                <ul class="bxslider-cultural">
                    <li><img src="{{ $cultural->image_1 }}" /></li>
                    <li><img src="{{ $cultural->image_2 }}" /></li>
                    <li><img src="{{ $cultural->image_3 }}" /></li>
                    <li><img src="{{ $cultural->image_4 }}" /></li>
                    <li><img src="{{ $cultural->image_5 }}" /></li>
                    <li><img src="{{ $cultural->image_6 }}" /></li>
                    <li><img src="{{ $cultural->image_7 }}" /></li>
                </ul>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-12"><strong class="title-show">Title :</strong>
                    <span>{{ $cultural->title }}</span>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-12"><p><strong>Description :</strong></p>
                    <p>{!! $cultural->description !!}</p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 job-show-btn" style="padding: 0">
                <a class="btn-back btn btn-primary" href="{{ route('cultural.index') }}"> Back</a>
            </div>
        </div>
    </div>
@endsection
