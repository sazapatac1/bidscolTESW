@extends('layouts.master')

@section("title", $data["title"])


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="card mb-3">
            <div class="card-body d-flex">
                @lang('list.List_of_categorie')   
                <a href="{{route('category.create')}}" class="btn btn-success btn-sm ml-auto">@lang('list.create_new')</a>
            </div>
        </div>
        @include('util.message')
        <table class="table table-bordered table-striped">
            <thead>
                <th>@lang('list.ID')</th>
                <th>@lang('list.Categories')</th>
                <th>@lang('list.Edit')</th>
                <th>@lang('list.Delete')</th>
            </thead>
            <tbody>
            <tr>
                @foreach($data["categories"] as $category)
                <td>{{ $category->getId() }}</td>
                <td>{{ $category->getName() }}</td>
                <td><button type="button" class="btn btn-success" onClick="window.location='{{ route('category.edit',['id' => $category->getId()]) }}'">
                @lang('list.Edit')</button></td> 
                <td>
                    <form action="{{ route('category.delete', ['id' => $category->getId() ]) }}" method="post">
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