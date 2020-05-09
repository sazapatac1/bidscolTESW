@extends('layouts.master')

@section('content')
<div class="container">
    @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
    @endif
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
    <!--Carousel
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="img/carousel.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="img/carousel1.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="img/carousel2.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    End Carousel-->
</div>
@endsection

