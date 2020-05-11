@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('edit.Edit_bid')</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <form method="POST" action="{{ route('bid.update')}}">
                    @csrf
                    <label>@lang('edit.bid_value')</label>
                    <input class="form-control" type="number" name="bid_value" value="{{ $bid->getBidValue() }}" />
                    <input name="bid_id" type="hidden" value="{{$bid->getId()}}">
                    <button class="btn btn-success mt-2" type="submit" value="Send">@lang('edit.Edit')</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection