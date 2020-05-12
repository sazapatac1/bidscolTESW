@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
    @include('util.message')
        <div class="card">
            <div class="card-header"><h4>@lang('items.createitem') </h4></div>
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
                    <form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>@lang('items.name')</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                          <label>@lang('items.description')</label>
                          <br>
                          <textarea name="description" class="form-control" rows="5" placeholder="@lang('items.textarea')"required></textarea>
                        </div>
                        <div class="form-group">
                            <label>@lang('items.category')</label>
                            <br>
                            <select name="category_id" class="form-control">
                                <option value ="" selected>Choose...</option>
                                @foreach($data["categories"] as $category)            
                                <option value="{{$category->getId()}}">{{$category->getName()}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <br>
                            <input type="file" name="item_image"/>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>@lang('items.minimum_bid')</label>
                                <input type="number" class="form-control" name="initial_bid" placeholder="$"required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>@lang('items.status')</label>
                                <br>
                                <select name="status" class="form-control">
                                    <option selected value="Active"> @lang('items.active') </option>
                                    <option value="Inactive">@lang('items.inactive')</option>
                                </select>
                            </div>
                        </div>
                        <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="start">@lang('items.startdate')</label>
                                <input type="date" name="start_date">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="finish">@lang('items.finishdate')</label>
                                <input type="date" name="final_date">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success pull-right">@lang('items.submit')</button>
                      </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection