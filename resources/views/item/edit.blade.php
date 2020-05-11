@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
            @if($item = $data["item"])
            @endif
            <div class="card">
                <div class="card-header">@lang('edit.Edit_item') <b>{{ $item->getName() }}</b></div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <form method="POST" action="{{ route('item.update')}}">
                    @csrf
                    <input name="item_id" type="hidden" value="{{$item->getId()}}">
                    <label>@lang('items.name')</label>
                    <input class="form-control" type="text" name="name" value="{{$item->getName()}}" />
                    <br>
                    <label>@lang('items.description')</label>
                    <textarea name="description"class="form-control" rows="5" value="{{$item->getDescription()}}">{{$item->getDescription()}}</textarea>
                    <br>
                    <label>@lang('items.category')</label>
                    <select name="category_id" class="form-control">
                        <option value ="{{$item->category->getId()}}">{{$item->category->getName()}}</option>
                        @foreach($data["categories"] as $category)            
                        <option value="{{$category->getId()}}">{{$category->getName()}}</option>
                        @endforeach
                    </select>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>@lang('items.minimum_bid')</label>
                            <input type="number" class="form-control" name="initial_bid" value="{{$item->getInitial_bid()}}"required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>@lang('items.status')</label>
                            <br>
                            <select name="status" class="form-control">
                                <option selected> {{$item->getStatus()}} </option>
                                <option>@lang('items.active')</option>
                                <option>@lang('items.inactive')</option>
                                <option>@lang('items.finished')</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="start">@lang('items.startdate')</label>
                            <input type="date" name="start_date" value="{{$item->getStart_date()}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="finish">@lang('items.finishdate')</label>
                            <input type="date" name="final_date" value="{{$item->getFinal_date()}}">
                        </div>
                    </div>
                    <button class="btn btn-success mt-2 pull-right" type="submit" value="Send">@lang('edit.Edit')</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection