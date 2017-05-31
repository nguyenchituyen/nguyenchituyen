<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/16/2017
 * Time: 15:11
 */
?>
@extends('layouts.layout')

@section('title', 'index')
@section('icon', 'fa fa-suitcase')
@section('page_header', 'Search Job')

@section('content')
    {!! Breadcrumbs::render('job') !!}
    <div class="customize-form col-md-12 col-lg-9">
        <table class="table table-striped">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8" style="padding: 0">
                    <form action="{{route('job.index')}}" method="get" accept-charset="UTF-8">
                        <div class="form-group col-md-6 col-sm-6 col-xs-8">
                            <input type="text" name="search_title" value="" class="form-control" placeholder="Search Title"/>
                        </div>
                        <input type="submit" name="search" class="btn btn-default" value="Search"/>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 text-right">
                    <a class="btn btn-success" href="{{ route('job.create')}}">Create</a>
                    <a class="btn btn-danger" href="#" onclick="deleteAllJob();">Delete</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <thead>
                        <tr>
                            <td><input type="checkbox" id="select_all"/></td>
                            <td><b>#</b></td>
                            <td><b>Images</b></td>
                            <td><b>Title</b></td>
                            <td class="hidden-sm hidden-xs"><b>Views</b></td>
                            <td class="hidden-sm hidden-xs"><b>Author</b></td>
                            <td class="hidden-sm hidden-xs"><b>Date Create</b></td>
                            <td><b>Action</b></td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $key => $job)
                        <tr>
                            <td><input class="checkbox" type="checkbox" name="check[]" value="{{ $job->id }}"></td>
                            <td>{!! $orderNumber++ !!}</td>
                            <td width="10%">
                                @if(!empty($job->images))
                                    <img src="{{URL::to($job->images)}}" id='image_show' style='width:100%;'>
                                @else
                                    <img src="{{asset('img/default.png')}}" id='image_show' style='width:100%;height:15%'>
                                @endif
                            </td>
                            <td>{{ $job->title }}</td>
                            <td class="hidden-sm hidden-xs">{{ $job->views }}</td>
                            <td class="hidden-sm hidden-xs">{{ $job->staff_name }}</td>
                            <td class="hidden-sm hidden-xs">{{ $job->created_at }}</td>
                            <td class="action-column" align="left">
                                <a href="{{ route('job.show',$job->id) }}"><i class="fa fa-search"></i></a>
                                <a href="{{ route('job.edit',$job->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="#" onclick="javascript:confirmDelete('{{ route('job.delete', $job->id) }}')">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </div>
            </div>
        </table>
        {!! $jobs->render() !!}
    </div>
@endsection