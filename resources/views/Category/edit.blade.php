@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('edit.Edit_category') <b>{{ $category->getName() }}</b></div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <form method="POST" action="{{ route('category.update')}}">
                    @csrf
                    <label>@lang('items.name')</label>
                    <input class="form-control" type="text" name="name" value="{{ $category->getName() }}" />
                    <input name="category_id" type="hidden" value="{{$category->getId()}}">
                    <button class="btn btn-success mt-2" type="submit" value="Send">@lang('edit.Edit')</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection