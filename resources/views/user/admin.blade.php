@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
    @include('util.message')
        <div class="card">
        <div class="card-header">
            <h4> @lang('admin.welcome') </h4>
        </div>
        <div class="card-body">
            @if($errors->any())
            <h4>The form contains some errors</h4>
            <ul id="errors" class="text-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <div class="list-groupm mt-2">
            <p class="card-subtitle"><b>@lang('user_profile.name'): </b>{{ Auth::user()->getName()}}</p>
            <br>
            <p class="card-subtitle"><b>@lang('user_profile.email'): </b>{{ Auth::user()->getEmail()}}</p>
            <br>
            <a href="{{route('user.list')}}" class="list-group-item list-group-item-action">@lang('admin.users')</a>
            <a href="{{route('item.list')}}" class="list-group-item list-group-item-action">@lang('admin.products')</a>
            <a href="{{route('category.list')}}" class="list-group-item list-group-item-action">@lang('admin.categories')</a>
            <a href="{{route('bid.list')}}" class="list-group-item list-group-item-action">@lang('admin.bids')</a>
            <a href="{{route('comment.list')}}" class="list-group-item list-group-item-action">@lang('admin.comments')</a>
        </div>
        </div>
    </div>
</div>
@endsection