@extends('layouts.layout')

@section('title', 'role')
@section('icon', 'icon_genius')
@section('page_header', 'ROLES MANAGEMENT')

@section('content')
    {!! Breadcrumbs::render('role') !!}
    <div class="customize-form col-md-12 col-lg-9">
        <table class="table table-striped">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12" style="padding: 0">
                    <form action="{{route('role.search')}}" method="get">
                        <div class="form-group col-md-6 col-sm-6 col-xs-8">
                            <input type="text" name="name" value="" class="form-control" placeholder="Search">
                        </div>
                        <input type="submit" name="search" class="btn btn-default" value="Search"/>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-5 text-right hidden-xs">
                    <a class="btn btn-success" href="{{ route('role.create') }}">Create New Role</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <tr>
                        <td><b>#</b></td>
                        <td><b>Name</b></td>
                        <td><b>Description</b></td>
                        <td class="hidden-sm hidden-xs"><b>Create Date</b></td>
                        <td class="hidden-sm hidden-xs"><b>Update Date</b></td>
                        <td><b>Action</b></td>
                    </tr>
                    @foreach($roles as $role)
                        <tr>
                            <td><b>{{ $orderNumber++ }}</b></td>
                            <td><b>{{ $role->name }}</b></td>
                            <td><b>{{ $role->description }}</b></td>
                            <td class="hidden-sm hidden-xs"><b>{{ date('Y/m/d', strtotime($role->created_at)) }}</b></td>
                            <td class="hidden-sm hidden-xs"><b>{{ date('Y/m/d', strtotime($role->updated_at)) }}</b></td>
                            <td class="action-column">
                                <a href="{{ route('role.edit',$role->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="#" onclick="javascript:confirmDelete('{{ route('role.destroy', $role->id) }}');">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </div>
            </div>
        </table>
        {!! $roles->appends(request()->input())->links() !!}
    </div>
@stop