@extends('layouts.layout')

@section('title', 'user')
@section('icon', 'icon_document_alt')
@section('page_header', 'USERS MANAGEMENT')

@section('content')
    {!! Breadcrumbs::render('user') !!}
    <div class="customize-form col-md-12 col-lg-9">
        <table class="table table-striped">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12" style="padding: 0">
                    <form action="{{route('user.search')}}" method="get">
                        <div class="form-group col-md-6 col-sm-6 col-xs-8">
                            <input type="text" name="name" value="" class="form-control" placeholder="Search"/>
                        </div>
                        <input type="submit" name="search" class="btn btn-default" value="Search"/>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-5 text-right hidden-xs">
                    <a class="btn btn-success" href="{{ route('user.create') }}"> Create New User</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <tr>
                        <td><b>#</b></td>
                        <td><b>Name</b></td>
                        <td><b>Email</b></td>
                        <td class="hidden-sm hidden-xs"><b>Create Date</b></td>
                        <td class="hidden-sm hidden-xs"><b>Update Date</b></td>
                        <td><b>Action</b></td>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td><b>{{ $orderNumber++ }}</b></td>
                            <td><b>{{ $user->name }}</b></td>
                            <td><b>{{ $user->email }}</b></td>
                            <td class="hidden-sm hidden-xs"><b>{{ $user->created_at }}</b></td>
                            <td class="hidden-sm hidden-xs"><b>{{ $user->updated_at }}</b></td>
                            <td class="action-column" align="left">
                                <a href="{{ route('user.show',$user->id) }}"><i class="fa fa-search"></i></a>
                                <a href="{{ route('user.edit',$user->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="#" onclick="javascript:confirmDelete('{{ route('user.destroy', $user->id) }}')">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </div>
            </div>
        </table>
        {!! $users->appends(request()->input())->links() !!}
    </div>
@endsection