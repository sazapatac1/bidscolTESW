@extends('layouts.master')

@section("title", $data["title"])


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="card mb-3">
            <div class="card-body d-flex">
                @lang('list.List_of_items')   
                <a href="{{route('item.create')}}" class="btn btn-success btn-sm ml-auto">@lang('list.create_new')</a>
            </div>
        </div>
        @include('util.message')
        <table class="table table-bordered table-striped">
            <thead>
                <th>@lang('list.ID')</th>
                <th>@lang('list.name')</th>
                <th>@lang('list.description')</th>
                <th>@lang('list.category')</th>
                <th>@lang('list.state')</th>
                <th>@lang('list.initial_bid')</th>
                <th>@lang('list.start_date')</th>
                <th>@lang('list.final_date')</th>
                <th>@lang('list.Edit')</th>
                <th>@lang('list.Delete')</th>
            </thead>
            <tbody>
            <tr>
                @foreach($data["items"] as $item)
                <td>{{ $item->getId() }}</td>
                <td>{{ $item->getName() }}</td>
                <td>{{ $item->getDescription() }}</td>
                <td>{{ $item->category->getName() }}</td>
                <td>{{ $item->getStatus() }}</td>
                <td>{{ $item->getInitial_bid() }}</td>
                <td>{{ $item->getStart_date() }}</td>
                <td>{{ $item->getFinal_date() }}</td>
                <td><button type="button" class="btn btn-success" onClick="window.location='{{ route('item.edit',['id' => $item->getId()]) }}'">
                @lang('list.Edit')</button></td>   
                <td>
                    <form action="{{ route('item.delete', ['id' => $item->getId() ]) }}" method="post">
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