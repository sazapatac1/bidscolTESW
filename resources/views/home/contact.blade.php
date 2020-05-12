@extends('layouts.master')



@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
    @include('util.message')
        <div class="card">
            <div class="card-header"><h4>@lang('contact.createcontact') </h4></div>
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
                        <div class="form-group">
                            <label>@lang('contact.name')</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label>@lang('contact.email')</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                          <label>@lang('items.description')</label>
                          <br>
                          <textarea name="description" class="form-control" rows="5" placeholder="@lang('contact.textarea')"required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success pull-right">@lang('contact.submit')</button>
                      </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection