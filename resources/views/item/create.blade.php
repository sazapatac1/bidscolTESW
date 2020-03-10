@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><h4> @lang('items.createitem') </h4></div>
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
                    <form method="POST" action="{{ route('item.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>@lang('items.name')</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                          <label>@lang('items.description')</label>
                          <br>
                          <textarea name="description" rows="5" cols="118" required>@lang('items.textarea')</textarea>
                        </div>
                        <div class="form-group">
                            <label>@lang('items.minimum_bid')</label>
                            <input type="number" class="form-control" name="initial_bid" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                          <label>@lang('items.status')</label>
                          <br>
                          <select name="status" size="2">
                            <option selected> @lang('items.active') </option>
                            <option>@lang('items.inactive')</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="start">@lang('items.startdate')</label>
                            <input type="date" id="startdate" name="start_date"
                            value="2020-01-01"
                            min="2020-01-01">
                        </div>
                        <div class="form-group">
                            <label for="finish">@lang('items.finishdate')</label>
                            <input type="date" id="finishdate" name="final_date"
                            value="2020-01-01"
                            min="2020-01-01">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
                      </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection