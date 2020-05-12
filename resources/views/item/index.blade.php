@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="justify-content-center">
        <!-- Search bar -->
        <div class="row mb-3">
                <div class="dropdown">
                    <a class="btn btn-success dropdown-toggle mr-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('searchbar.category')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('item.index', ['option' => 'all', 'id' => 0]) }}">All</a>
                        @foreach($data["categories"] as $category)
                                <a class="dropdown-item" href="{{ route('item.index', ['option' => 'category', 'id' => $category->getId()]) }}">{{$category->getName()}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="dropdown">
                    <a class="btn btn-success dropdown-toggle mr-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('searchbar.state')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('item.index', ['option' => 'all', 'id' => 0]) }}">All</a>
                        <a class="dropdown-item" href="{{ route('item.index', ['option' => 'state', 'id' => 'Active'])}}">@lang('items.active')</a>
                        <a class="dropdown-item" href="{{ route('item.index', ['option' => 'state', 'id' => 'Inactive'])}}">@lang('items.inactive')</a>
                        <a class="dropdown-item" href="{{ route('item.index', ['option' => 'state', 'id' => 'Finished'])}}">@lang('items.finished')</a>
                    </div>
                </div>
                <input type="text" class="col-sm-8 rounded-0" placeholder="@lang('searchbar.searchDescription')">
                <button type="button" class="btn btn-success col-sm rounded-0">@lang('searchbar.search')</button>  
        </div>
        <!-- End Search bar -->
        <div class="text-right">
            <a href="{{ route('item.create') }}" class="btn btn-success mb-3" style="width: 200px;" disabled>@lang('items.sell')</a>
        </div>
        <h1 class="mb-3">{{$data["subtitle"]}}</h1>
        <div class="col-md-15 row">
        @foreach($data["items"] as $item)
        <div class="card mb-3 ml-3" style="width: 16rem;">
            <img class="card-img-top" height="300" width="300" src="{{ URL::asset('storage/images') }}/{{$item->getImage_name()}}" alt="Card image cap">
            <div class="card-header card-title">
                <h5 class="card-title">
                    <a class="text-dark" href="{{ route('item.show', ['id' => $item->getId()]) }}">
                        {{ $item->getName() }} 
                    </a>
                    <i class="card-text pull-right small-letter mt-3">{{ $item->category->getName() }}</i>
                </h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $item->getDescription() }}</p>
                @if($item->getStatus() == 'Active')
                    <p class="card-text text-success">@lang('items.active')</p>
                    <p class="card-text">{{ $item->getDaysLeft()}} @lang('items.days_left')</p>
                    <div class="text-center">
                        <a href="{{ route('item.show', ['id' => $item->getId()])}}" class="btn btn-success" style="width: 100px;">@lang('items.bid')</a>
                    </div>
                @elseif($item->getStatus() == 'Inactive')
                    <p class="card-text text-warning">@lang('items.inactive')</p>
                    <p class="card-text">{{ $item->getDaysLeft()}} @lang('items.days_left')</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-warning disabled" style="width: 100px;" disabled>x</a>
                    </div>
                @else
                <p class="card-text text-danger">@lang('items.finished')</p>
                    <div class="text-center">
                        <br>
                        <a href="{{ route('item.show', ['id' => $item->getId()])}}" class="btn btn-success mt-3" style="width: 120px;">@lang('items.see_winner')</a>
                    </div>
                @endif
            </div>
        </div>
        @endforeach
        </div>
    </div>
</div>
@endsection


