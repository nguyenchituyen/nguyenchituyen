@extends('layouts.layout')

@section('title', 'Resource')
@section('icon', 'icon_genius')
@section('page_header', 'ROLES ACTION MANAGEMENT')

@section('content')
    {!! Breadcrumbs::render('resource') !!}
    <div class="customize-form col-md-12 col-lg-9">
        <table class="table table-striped">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12" style="padding: 0">
                    <form action="{{route('resource.search')}}" method="get">
                        <div class="form-group col-md-6 col-sm-6 col-xs-8">
                            <input type="text" name="name" value="" class="form-control" placeholder="Search"/>
                        </div>
                        <input type="submit" name="search" class="btn btn-default" value="Search"/>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-5 text-right hidden-xs">
                    <a class="btn btn-success" href="{{ route('resource.create') }}"> Create New Role Action</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <tr>
                        <td><b>#</b></td>
                        <td><b>Name</b></td>
                        <td><b>Controller</b></td>
                        <td><b>Permission Action</b></td>
                        <td class="hidden-sm hidden-xs"><b>Type</b></td>
                        <td class="hidden-sm hidden-xs"><b>Create Date</b></td>
                        <td class="hidden-sm hidden-xs"><b>Update Date</b></td>
                        <td><b>Action</b></td>
                    </tr>
                    @foreach($resources as $resource)
                        <tr>
                            <td><b>{{ $orderNumber++ }}</b></td>
                            <td><b>{{ $resource->name }}</b></td>
                            <td><b>{{ $resource->controller }}</b></td>
                            <td><b>{{ $resource->action }}</b></td>
                            <td class="hidden-sm hidden-xs"><b>{{ $resource->type }}</b></td>
                            <td class="hidden-sm hidden-xs"><b>{{ date('Y/m/d', strtotime($resource->created_at)) }}</b></td>
                            <td class="hidden-sm hidden-xs"><b>{{ date('Y/m/d', strtotime($resource->updated_at)) }}</b></td>
                            <td class="action-column" align="left">
                                <a href="{{ route('resource.edit',$resource->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="#" onclick="javascript:confirmDelete('{{ route('resource.destroy', $resource->id) }}')">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </div>
            </div>
        </table>
        {!! $resources->appends(request()->input())->links() !!}
    </div>
@stop