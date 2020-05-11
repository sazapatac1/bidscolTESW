@extends('layouts.master')

@section('content')
    <div class="container">
    @include('util.message')
        <h1>Wish List</h1>
        <div class="product-detail">
            <div class="container-fluid">
                @if(isset($message))
                    <div class="alert alert-success">
                        {{$message}}
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>@lang('wish.name')</th>
                                <th>@lang('wish.status')</th>
                                <th>@lang('wish.category')</th>
                                <th>@lang('wish.initialbid')</th>
                                <th>@lang('wish.daysleft')</th>
                                <th>@lang('wish.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wishlist as $wish)
                                <tr>
                                    <td>
                                        <a href="{{ route('item.show', ['id' => $wish->item->getId()]) }}">{{ $wish->item->getName() }}</a>
                                    </td>
                                    <td>{{ $wish->item->getStatus() }}</td>
                                    <td>{{ $wish->item->category->getName() }}</td>
                                    <td>{{ $wish->item->getInitial_bid() }}</td>
                                    <td>{{ $wish->item->getDaysLeft() }}</td>
                                    <td>
                                        <form action="{{ route('wishlist.delete', ['id' => $wish->getId() ]) }}" method="post">
                                            <input class="btn btn-danger" type="submit" value="Delete" />
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection