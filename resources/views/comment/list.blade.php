@extends('layouts.master')

@section("title", $data["title"])


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="card mb-3">
            <div class="card-body d-flex">
                @lang('list.List_of_comments')   
            </div>
        </div>
        @include('util.message')
        <table class="table table-bordered table-striped">
            <thead>
                <th>@lang('list.ID')</th>
                <th>@lang('list.user')</th>
                <th>@lang('list.description')</th>
                <th>@lang('list.Edit')</th>
                <th>@lang('list.Delete')</th>
            </thead>
            <tbody>
            <tr>
                @foreach($data["comments"] as $comment)
                <td>{{ $comment->getId() }}</td>
                <td>{{ $comment->user->getName() }}</td>
                <td>{{ $comment->getDescription() }}</td>
                <td><button type="button" class="btn btn-success" onClick="window.location='{{ route('comment.edit',['id' => $comment->getId()]) }}'">
                @lang('list.Edit')</button></td> 
                <td>
                    <form action="{{ route('comment.delete', ['id' => $comment->getId() ]) }}" method="post">
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