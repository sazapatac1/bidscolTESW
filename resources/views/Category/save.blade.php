@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('save.Category') {{$message}} @lang('save.succesfully')</div>
                    <!-- @include('util.message') -->
            </div>
        </div>
    </div>
</div>
@endsection