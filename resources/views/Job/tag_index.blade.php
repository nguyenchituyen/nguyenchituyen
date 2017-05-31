@extends('layouts.layout')

@section('title', 'Tags')
@section('icon', 'icon_genius')
@section('page_header', 'Tags MANAGEMENT')

@section('content')
    {!! Breadcrumbs::render('Tags') !!}
    <div class="customize-form col-md-12 col-lg-9">
        <table class="table table-striped">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12" style="padding: 0">
                    <form action="{{ route('job.indexTag') }}" method="get">
                        <div class="form-group col-md-6 col-sm-6 col-xs-8">
                            <input type="text" name="search_title" value="" class="form-control" placeholder="Search"/>
                        </div>
                        <input type="submit" name="search" class="btn btn-default" value="Search"/>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-5 text-right hidden-xs">
                    <a class="btn btn-success" href="{{ route('job.createTag') }}"> Create New Tag</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <tr>
                        <td><b>#</b></td>
                        <td><b>Name Tag</b></td>
                        <td><b>Alias Tag</b></td>
                        <td class="hidden-sm hidden-xs"><b>Create Date</b></td>
                        <td class="hidden-sm hidden-xs"><b>Update Date</b></td>
                        <td><b>Action</b></td>
                    </tr>
                    @foreach($tags as $tag)
                        <tr>
                            <td><b>{{ $orderNumber++ }}</b></td>
                            <td><b>{{ $tag->name }}</b></td>
                            <td><b>{{ $tag->alias }}</b></td>
                            <td class="hidden-sm hidden-xs"><b>{{ date('Y/m/d', strtotime($tag->created_at)) }}</b></td>
                            <td class="hidden-sm hidden-xs"><b>{{ date('Y/m/d', strtotime($tag->updated_at)) }}</b></td>
                            <td>
                                <a href="{{ route('job.editTag',$tag->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="#" onclick="javascript:confirmDelete('{{ route('job.destroyTag', $tag->id) }}')">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                {{--{!! Form::open(['method' => 'DELETE','route' => ['job.destroyTag', $tag->id],'style'=>'display:inline','onsubmit' => 'return confirmDelete()']) !!}--}}
                                {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                                {{--{!! Form::close() !!}--}}
                            </td>
                        </tr>
                    @endforeach
                </div>
            </div>
        </table>
        {!! $tags->appends(request()->input())->links() !!}
    </div>
@stop