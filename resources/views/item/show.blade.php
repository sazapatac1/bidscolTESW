@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
@include('util.message')
    <!-- Details -->
    <div class="card">
        <div class="card-header bg-dark text-white">
            @lang('items.details')
            <form class="pull-right" method="POST" action="{{ route('wishlist.store')}}">
                @csrf
                <input name="item_id" type="hidden" value="{{$data['item']->getId()}}">
                <input name="user_id" type="hidden" value="{{Auth::user()->getId()}}">
                @if(!$data["wishitem"])
                    <button class="btn btn-warning" type="submit">@lang('wishlist.add')</button>
                @else
                    <button class="btn btn-warning" type="submit" disabled="true">@lang('wishlist.already')</button>
                @endif
            </form>             
            @if($data["item"]->getStatus()=='Active')
                [<b class="text-success">@lang('items.active')</b>]
            @elseif($data["item"]->getStatus()=='Inactive')
                [<b class="text-warning">@lang('items.inactive')</b>]
            @else
                [<b class="text-danger">@lang('items.sold')</b>]
            @endif
        </div>
        <div class="card-body row justify-content-center">
            <div class="col-4">
                @if($item = $data["item"])
                    <div class="text-center">
                        <img class="card-img-top" height="300" width="300" src="{{ URL::asset('storage/images') }}/{{$item->getImage_name()}}" alt="Card image cap">
                        <h5 class="card-title mt-3">{{ $item->getName() }}</h5>
                    </div>
                    <h6>@lang('items.description')</h6>
                    <p>{{ $item->getDescription()}}</p>
                    <h6>@lang('items.started')</h6> 
                    <p>$ {{$item->getInitial_Bid()}}</p>
                    <h6>@lang('items.days_left_1')</h6>
                    <p> {{$item->getDaysLeft()}} </p>
                @else
                    <div class="alert alert-warning" role="alert">
                        @lang('items.no_records').
                    </div>
                @endif 
            </div>
            <div class="mt-5 col-2 text-center align-middle">
                @if($item->getStatus()=='Active')
                    <h6>@lang('items.current'):</h6>
                    @if($data["max_bid"])
                        <p> <b class=text-success>${{$data["max_bid"]->getBidValue()}}</b>
                        @lang('items.by') {{$data["max_bid"]->user->getName()}}</p>
                        <p>[{{$data["nbids"]}} @lang('items.bids')]</p>
                    @else
                        <i> @lang('items.no_bids') </i>
                    @endif
                    <h5 class="mt-5">@lang('items.want_it')</h5>
                    <form method="POST" action="{{ route('bid.store') }}">
                    @csrf
                        @if($data["max_bid"])
                            <input name="bid_value" type="number" class="form-control" 
                            min='{{$data["max_bid"]->getBidValue()+1}}'  placeholder="$" value="{{ old('name') }}">
                        @else
                        <input name="bid_value" type="number" class="form-control" 
                            min='{{$data["item"]->getInitial_Bid()+1}}'  placeholder="$" value="{{ old('name') }}">
                        @endif
                        <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                        <input name="item_id" type="hidden" value="{{$item->getId()}}">
                        <button type="submit" class="mt-2 btn btn-success">@lang('items.place_bid')</button>
                    </form>
                    @if(Auth::user()->id==$data["item"]->user_id)
                        <form class="mt-5" method="POST" action="{{ route('item.finish')}}">
                            @csrf
                            <input name="item_id" type="hidden" value="{{$data['item']->getId()}}">
                            <button class="btn btn-danger" type="submit">@lang('items.finish')</button>
                        </form>                
                    @endif
                @elseif($item->getStatus()=='Finished')
                <h5>¡Winner!</h5>
                    @if($data["max_bid"])
                        <p> <b class=text-success>${{$data["max_bid"]->getBidValue()}}</b>
                        by {{$data["max_bid"]->user->getName()}}</p>
                        <p>[{{$data["nbids"]}} @lang('items.bids')]</p>
                    @else
                        <i> @lang('items.no_bids')] </i>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <!-- Comments -->
    <div class="card">
        <div class="card-header bg-dark text-white">@lang('items.comments')</div>
        <div class="card-body">
            <!-- write comment -->
            <form method="POST" action="{{ route('comment.store') }}">
                @csrf
                <label for="exampleFormControlTextarea1">@lang('items.write_comments')</label>
                <textarea class="form-control" name="description" rows="2"></textarea>
                <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                <input name="item_id" type="hidden" value="{{$data['item']->getId()}}">
                <button class="btn btn-success mt-2 pull-right" type="submit" value="Send">@lang('items.send')</button>
            </form>
            <br>
            <!-- see comments -->
            <h3 class="mt-5">@lang('items.all_comments'):</h3>
            <ul class="list-group">
            @foreach($data["comments"] as $comment)
                <li class="list-group-item">
                    <b class="text-success">{{$comment->user->getName()}}:</b>
                    @if(Auth::user()->getId()==$comment->user->getId())
                        <form class="pull-right"action="{{ route('comment.delete', ['id' => $comment->user_id ]) }}" method="post">
                            <input class="btn btn-danger pull-right" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                        </form>
                    @endif
                    <p class="ml-5 mt-3">{{$comment->getDescription()}} <i class="pull-right">{{$comment->getCreated_at()}}</i></p>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
