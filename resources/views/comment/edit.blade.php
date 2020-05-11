@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('edit.Edit_comment') <b>{{ $comment->getId() }}</b></div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <form method="POST" action="{{ route('comment.update')}}">
                    @csrf
                    <label>@lang('items.description')</label>
                    <textarea name="description"class="form-control" rows="5" value="{{$comment->getDescription()}}">{{$comment->getDescription()}}</textarea>
                    <input name="comment_id" type="hidden" value="{{$comment->getId()}}">
                    <button class="btn btn-success mt-2" type="submit" value="Send">@lang('edit.Edit')</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection