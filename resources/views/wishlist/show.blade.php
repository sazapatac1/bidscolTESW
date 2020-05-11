@extends('layouts.app')

@section('content')
    <div class="container">
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
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Photo</th>
                                <th>Acctions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wishlist as $wish)
                                <tr>
                                    <td>
                                        <a href="{{}}">{{ $wish->item->getName() }}</a>
                                    </td>
                                    <td>{{ $wish->item->getStatus() }}</td>
                                    <td>{{ $wish->item->category->getName() }}</td>
                                    <td>{{ $wish->item->getInitial_bid() }}</td>
                                    <td>{{ $wish->item->getDaysLeft() }}</td>
                                    <td>
                                        <a href="{{url('products/'.$wish->id)}}">
                                            <img class="img-responsive" src="../img/{{$wish->urlImage}}" alt=""/>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        {!! Form::open(['route' => ['wishlist.destroy', $wish->id], 'method' => 'POST']) !!}
                                        {!! Form::submit('Remove', ['class' => 'btn btn-sm btn-danger btn-delete']) !!}
                                        {!! Form::close() !!}
                                        {{--<a class="btn btn-sm btn-danger btn-delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>--}}
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