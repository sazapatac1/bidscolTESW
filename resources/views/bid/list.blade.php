@extends('layouts.master')

@section("title", $data["title"])


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="card mb-3">
            <div class="card-body d-flex">
                @lang('list.List_of_bids')
            </div>
        </div>
        @include('util.message')
        <table class="table table-bordered table-striped">
            <thead>
                <th>@lang('list.ID')</th>
                <th>Product</th>
                <th>@lang('list.bid_value')</th>
                <th>@lang('list.created_at')</th>
                <th>@lang('list.Edit')</th>
                <th>@lang('list.Delete')</th>
            </thead>
            <tbody>
            <tr>
                @foreach($data["bids"] as $bid)
                <td>{{ $bid->getId() }}</td>
                <td>{{ $bid->item->getName() }}</td>
                <td>{{ $bid->getBidValue()}}</td>
                <td>{{ $bid->getCreated_at() }}</td>
                <td><button type="button" class="btn btn-success" onClick="window.location='{{ route('bid.edit',['id' => $bid->getId()]) }}'">
                @lang('list.Edit')</button></td> 
                <td>
                    <form action="{{ route('bid.delete', ['id' => $bid->getId() ]) }}" method="post">
                        <input class="btn btn-danger" type="submit" value="Delete" />
                        @method('delete')
                        @csrf
                    </form>
                </td>     
            </tr>
            </tbody>
            @endforeach
        </table>
        </div>
    </div>
</div>
@endsection