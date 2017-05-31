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
@section('page_header', 'Candidate apply Job')

@section('content')
    {!! Breadcrumbs::render('job.jobsApply') !!}
    <div class="customize-form col-md-12 col-lg-9">
        <table class="table table-striped">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12" style="padding: 0">
                    <form action="{{route('job.apply_search')}}" method="get">
                        <div class="form-group col-md-6 col-sm-6 col-xs-8">
                            <input type="text" name="search" value="" class="form-control" placeholder="Search"/>
                        </div>
                        <input type="submit" class="btn btn-default" value="Search"/>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="hidden-sm hidden-xs">File Name</th>
                        <th class="hidden-sm hidden-xs">Date Apply</th>
                        <th>Action</th>
                    </tr>
                    @foreach($jobApply as $key => $apply)
                        <tr>
                            <td>{{ $orderNumber++ }}</td>
                            <td>{{ $apply->name }}</td>
                            <td>{{ $apply->email }}</td>
                            <td class="hidden-sm hidden-xs">{{ $apply->file }}</td>
                            <td class="hidden-sm hidden-xs">{{ date('Y/m/d', strtotime($apply->created_at)) }}</td>
                            <td>
                                <a href="{{route('job.show_apply',$apply->id)}}"><i class="fa fa-search"></i></a>
                                <a href="#" onclick="javascript:confirmDelete('{{ route('apply.delete', $apply->id) }}')">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </div>
            </div>
        </table>
        {!! $jobApply->appends(request()->input())->links() !!}
    </div>
@endsection