@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
    @include('util.message')
        <div class="card">
        <div class="card-header">
            <h4> @lang('user_profile.profile') </h4>
            <button type="button" class="btn btn-success pull-right">@lang('user_profile.download')</button>
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
            <p class="card-subtitle"><b>@lang('user_profile.products'): </b></p>
            <br>
            @foreach($data["items"] as $item)
                <a href="{{ route('item.show', ['id' => $item->getId()]) }}" class="list-group-item list-group-item-action">{{$item->getName()}} ({{$item->getStatus()}})</a>
            @endforeach
            <br>
            <p class="card-subtitle"><b>@lang('user_profile.bids'): </b></p>
            <br>
            <ul class="list-group">
                @foreach($data["bids"] as $bid)
                    <li class="list-group-item">
                        <b>{{$bid->name}}: </b>
                        ${{$bid->bid_value}} 
                        <i class="pull-right">{{$bid->created_at}}</i>
                    </li>
                @endforeach
            </ul>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection