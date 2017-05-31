@extends('layouts.layout')

@section('title', 'role')
@section('icon', 'icon_genius')
@section('page_header', 'CULTURAL MANAGEMENT')

@section('content')
    {!! Breadcrumbs::render('cultural') !!}
    <div class="customize-form col-md-12 col-lg-9">
        <table class="table table-striped">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8" style="padding: 0">
                    <form action="{{ route('cultural.index') }}" method="get" accept-charset="UTF-8">
                        <div class="form-group col-md-6 col-sm-6 col-xs-8">
                            <input type="text" name="search_title" value="{{ $keySearchTitle[0] }}" class="form-control" placeholder="Search Title"/>
                        </div>
                        <input type="submit" name="search" class="btn btn-default" value="Search"/>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 text-right">
                    <a class="btn btn-success" href="{{ route('cultural.create') }}"> Create New Cultural</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <tr>
                        <td><b>#</b></td>
                        <td><b>Title</b></td>
                        <td class="hidden-sm hidden-xs"><b>Create Date</b></td>
                        <td class="hidden-sm hidden-xs"><b>Update Date</b></td>
                        <td><b>Action</b></td>
                    </tr>
                    @foreach($culturals as $cultural)
                        <tr>
                            <td><b>{{ $orderNumber++ }}</b></td>
                            <td><b>{{ $cultural->title }}</b></td>
                            <td class="hidden-sm hidden-xs"><b>{{ date('Y/m/d', strtotime($cultural->created_at)) }}</b></td>
                            <td class="hidden-sm hidden-xs"><b>{{ date('Y/m/d', strtotime($cultural->updated_at)) }}</b></td>
                            <td class="action-column" align="left">
                                <a href="{{ route('cultural.show',$cultural->id) }}"><i class="fa fa-search"></i></a>
                                <a href="{{ route('cultural.edit',$cultural->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="#" onclick="javascript:confirmDelete('{{ route('cultural.destroy', $cultural->id) }}')">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    {!! $culturals->appends(request()->input())->links() !!}
                </div>
            </div>
        </table>
    </div>
@stop