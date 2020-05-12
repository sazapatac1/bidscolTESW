@extends('layouts.master')



@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
    @include('util.message')
        <div class="card">
            <div class="card-header"><h4>@lang('about.createabout') </h4></div>
            <div class="card-body">
                @if($errors->any())
                <h4>The form contains some errors</h4>
                <ul id="errors" class="text-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="list-groupm mt-2">
                    <form enctype="multipart/form-data">
                        @csrf
                        <div class="text-center">
                            <img src="img/logo.png" class="rounded mx-auto d-block" alt="...">
                        </div>
                        <div class="form-group">
                            <label>@lang('about.text')</label>
                        </div>
                      </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection