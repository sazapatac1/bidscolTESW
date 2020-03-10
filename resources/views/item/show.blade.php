@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">@lang('items.details')</div>
            <div class="card-body">
                @if($item = $data["item"])
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->getName() }}</h5>
                            <img class="card-img-top" src="data:image/png;base64,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" alt="Card image cap">   
                            <h6>@lang('items.description')</h6>
                            <p>{{ $item->getDescription()}}</p>
                            <h6>@lang('items.status') - @lang('items.bid')</h6> 
                            <p>{{ $item->getStatus() . " - " . $item->getInitial_Bid()     }}</p>
                            <h6>@lang('items.startdate') - @lang('items.finishdate')</h6>
                            <p>{{ $item->getStart_date() . " - " . $item->getFinal_date()  }}</p>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        No records found.
                    </div>
                @endif 
                </div>
        </div>
    </div>
</div>
@endsection