@extends('layouts.layout')

@section('title', 'Contacts')
@section('icon', 'icon_contacts_alt')
@section('page_header', 'CONTACTS MANAGEMENT')

@section('content')
    {!! Breadcrumbs::render('contact') !!}
    <div class="customize-form col-md-12 col-lg-9">
        <table class="table table-striped">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12" style="padding: 0">
                    <form action="{{  route('contact.search') }}" method="get">
                        <div class="form-group col-md-6 col-sm-6 col-xs-8">
                            <input type="text" name="name" value="" class="form-control" placeholder="Search"/>
                        </div>
                        <input class="btn btn-default" type="submit" name="search" value="Search"/>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <tr>
                        <td><b>.No</b></td>
                        <td><b>Name</b></td>
                        <td class="hidden-sm hidden-xs"><b>Status</b></td>
                        <td class="hidden-xs"><b>Email</b></td>
                        <td class="hidden-xs"><b>Message</b></td>
                        <td><b>Action</b></td>
                    </tr>
                    @foreach($contacts as $contact)
                        <tr>
                            <td><b>{{$contact->id}}</b></td>
                            <td><b>{{$contact->name}}</b></td>
                            <td class="hidden-sm hidden-xs"><b>{{$contact->status}}</b></td>
                            <td class="hidden-xs">{{$contact->email}}</td>
                            <td class="contact-message hidden-xs">{{$contact->message}}</td>
                            <td>
                                <a href="{{ route('contact.show', $contact->id) }}"><i class="fa fa-search"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </div>
            </div>
        </table>
        {!! $contacts->appends(request()->input())->links() !!}
    </div>
@endsection