@extends('layouts.master')

@section("title", $data["title"])


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="card">
                <div class="card-body d-flex">
                    @lang('list.List_of_categorie')

                    <form class="form-inline ml-3">
                        <div class= "input-group input-group-sm">
                            <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search Categories" arial-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    @lang('list.Search')<i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <a href="/bidscol/public/create" class="btn btn-primary btn-sm ml-auto">@lang('list.create_new')</a>
                </div>
        </div>
                <table class="table table-bordered table-striped" style="margin-top:20px;">
                    <thead>
                        <th>@lang('list.ID')</th>
                        <th>@lang('list.Categories')</th>
                        <th>@lang('list.Delete')</th>
                        <th>@lang('list.Edit')</th>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($data["categories"] as $category)
                        <td>{{ $category->getId() }}</td>
                        <td>{{ $category->getName() }}</td>
                        <td><form action="{{ route('category.delete', ['id' => $category->getId() ]) }}" method="post">
                                    <input class="btn btn-danger" type="submit" value="Delete" />
                                    @method('delete')
                                    @csrf
                                </form>
                        </td>
                        <td><button type="button" class="btn btn-primary" onClick="window.location='{{ route('category.edit',['id' => $category->getId()]) }}'">
                        @lang('list.Edit')</button></td>   
                    </tr>
                    </tbody>
                    @endforeach
                </table>
        </div>
    </div>
</div>
@endsection