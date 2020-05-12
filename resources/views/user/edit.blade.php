@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('edit.Edit_user') <b>{{ $user->getName() }}</b></div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <form method="POST" action="{{ route('user.update')}}">
                    @csrf
                    <label>@lang('user.name')</label>
                    <input class="form-control" type="text" name="name" value="{{ $user->getName() }}" />
                    <br>
                    <label>@lang('user.email')</label>
                    <input class="form-control  @error('email') is-invalid @enderror" type="email" name="email" value="{{ $user->getEmail() }}" required autocomplete="email"/>
                    <input name="user_id" type="hidden" value="{{$user->getId()}}">
                    <button class="btn btn-success mt-2" type="submit" value="Send">@lang('edit.Edit')</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection