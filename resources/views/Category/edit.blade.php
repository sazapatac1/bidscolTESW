@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
        <!-- @include('util.message') -->
            <div class="card">
                <div class="card-header">@lang('edit.Edit_category') {{ $category->getName() }}</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('category.update', ['id' => $category->getId() ]) }}">
                    @method('PACTH')
                    @csrf
                    <div>
                     <input class="form-control" type="text" placeholder= {{ $category->getName() }} name="title" value="{{ old('title') }}" />
                    </div>
                    <button class="btn btn-success" type="submit" value="Send">@lang('edit.Edit')</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection