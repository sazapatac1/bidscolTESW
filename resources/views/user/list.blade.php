@extends('layouts.master')

@section("title", $data["title"])


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="card mb-3">
            <div class="card-body d-flex">
                @lang('list.List_of_users')   
            </div>
        </div>
        @include('util.message')
        <table class="table table-bordered table-striped">
            <thead>
                <th>@lang('list.ID')</th>
                <th>@lang('list.name')</th>
                <th>@lang('list.email')</th>
                <th>@lang('list.Edit')</th>
                <th>@lang('list.Delete')</th>
            </thead>
            <tbody>
            <tr>
                @foreach($data["users"] as $user)
                <td>{{ $user->getId() }}</td>
                <td>{{ $user->getName() }}</td>
                <td>{{ $user->getEmail() }}</td>
                <td><button type="button" class="btn btn-success" onClick="window.location='{{ route('user.edit',['id' => $user->getId()]) }}'">
                @lang('list.Edit')</button></td> 
                <td>
                    <form action="{{ route('user.delete', ['id' => $user->getId() ]) }}" method="post">
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