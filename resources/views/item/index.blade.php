@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="text-right">
            <a href="{{ route('item.create') }}" class="btn btn-success mb-3" style="width: 200px;" disabled>@lang('items.sell')</a>
        </div>
        <h1 class="mb-3">@lang('items.all_products')</h1>
        <div class="col-md-15 row">
        @foreach($data["items"] as $item)
        <div class="card mb-3 ml-3" style="width: 16rem;">
            <img class="card-img-top" src="data:image/png;base64,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" alt="Card image cap">   
            <div class="card-header card-title">
                <h5 class="card-title">
                    <a class="text-dark" href="{{ route('item.show', ['id' => $item->getId()]) }}">
                        {{ $item->getName() }} 
                    </a>
                </h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $item->getDescription() }}</p>
                @if($item->getStatus() == 'Active')
                    <p class="card-text text-success">{{ $item->getStatus() }}</p>
                    <p class="card-text">{{ $item->getDaysLeft()}} @lang('items.days_left')</p>
                    <div class="text-center">
                        <a href="{{ route('item.show', ['id' => $item->getId()])}}" class="btn btn-success" style="width: 100px;">@lang('items.bid')</a>
                    </div>
                @elseif($item->getStatus() == 'Inactive')
                    <p class="card-text text-warning">{{ $item->getStatus() }}</p>
                    <p class="card-text">{{ $item->getDaysLeft()}} @lang('items.days_left')</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-warning disabled" style="width: 100px;" disabled>x</a>
                    </div>
                @else
                <p class="card-text text-danger">{{ $item->getStatus() }}</p>
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


