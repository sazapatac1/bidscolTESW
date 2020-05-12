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
    <!--Carousel -->
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
    <!--End Carousel-->

    <!-- statistics -->
    <div class="mt-5 row">
        <!-- Biggest bid -->
        @if($data["biggest_bid"] && $item = $data["biggest_bid"]->item)
        <div class="col">
            <div class="card">
                <h5 class="card-header card-title">Biggest bid in the history</h5>
                <img class="card-img-top" height="300" width="300" src="{{ URL::asset('storage/images') }}/{{$item->getImage_name()}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-dark" href="{{ route('item.show', ['id' => $item->getId()]) }}">
                            {{ $item->getName() }} 
                        </a>
                        <i class="card-text pull-right small-letter mt-3">{{ $item->category->getName() }}</i>
                    </h5>
                    <p class="card-text"><b>Bid: </b>${{ $data["biggest_bid"]->getBidValue() }}</p>
                </div>
            </div>
        </div>
        @endif
        <!-- Product with more bids -->
        @if($data["mostItem_bids"] && $item = $data["mostItem_bids"])
        <div class="col">
            <div class="card">
                <h5 class="card-header card-title">Product with more bids</h5>
                <img class="card-img-top" height="300" width="300" src="{{ URL::asset('storage/images') }}/{{$item->getImage_name()}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-dark" href="{{ route('item.show', ['id' => $item->getId()]) }}">
                            {{ $item->getName() }} 
                        </a>
                        <i class="card-text pull-right small-letter mt-3">{{ $item->category->getName() }}</i>
                    </h5>
                    <p class="card-text"><b>{{ $item->bids_count}}</b> bids.</p>
                </div>
            </div>
        </div>
        @endif
        <!-- Product in more wish lists -->
        @if($data["mostItem_wishLists"] && $item = $data["mostItem_wishLists"])
        <div class="col">
            <div class="card">
                <h5 class="card-header card-title">Product in more wish lists</h5>
                <img class="card-img-top" height="300" width="300" src="{{ URL::asset('storage/images') }}/{{$item->getImage_name()}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-dark" href="{{ route('item.show', ['id' => $item->getId()]) }}">
                            {{ $item->getName() }} 
                        </a>
                        <i class="card-text pull-right small-letter mt-3">{{ $item->category->getName() }}</i>
                    </h5>
                    <p class="card-text">In <b>{{ $item->wishlists_count}}</b> wish lists.</p>
                </div>
        </div>
        </div>
        @endif
    </div>
    <!-- api money -->
    <table class="mt-5 table text-center">
        <thead>
            <tr>
                <td colspan="5"><strong> @lang('apis.currency_exchange_rate') </strong></td>
            </tr>
            <tr>
                <th>@lang('apis.date')</th>
                <th>@lang('apis.euro')</th>
                <th>@lang('apis.dollar')</th>
                <th>@lang('apis.yen')</th>
                <th>@lang('apis.pound_sterling')</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $cambioMoneda['usd']['date'] }}</td>
                <td>{{ $cambioMoneda['eur']['inverseRate'] }}</td>
                <td>{{ $cambioMoneda['usd']['inverseRate'] }}</td>
                <td>{{ $cambioMoneda['jpy']['inverseRate'] }}</td>
                <td>{{ $cambioMoneda['gbp']['inverseRate'] }}</td>
            </tr>
        </tbody>
    </table>
    <!-- api gym -->
    <div class="container">
        <h6 class = "text-center"> @lang('apis.maybe_it_may_interest_you') </h6>
        <div class=row>
            @foreach($rutinasEjercicio['data'] as $rutinas)
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"> {{ $rutinas['exercise']['name'] }} </h6>
                        <p class = "card-text"> {{ $rutinas['exercise']['description'] }} </p>
                        <a href="#" class="btn btn-success"> @lang('apis.see_exercise') </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection

