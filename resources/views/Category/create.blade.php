@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
        @include('util.message')
            <div class="card">
                <div class="card-header">@lang('create.Create_category')</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('category.save') }}">
                    @csrf
                    <div>
                     <input class="form-control" type="text" placeholder="Enter name" name="name" value="{{ old('title') }}" />
                    </div>
                    <button class="btn btn-success mt-2" type="submit" value="Send">@lang('create.create')</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection