@extends('layouts.app')
@section('content')
    <a href="{{route('departments.index')}}" class="btn btn-primary">Back</a>
    <form action="{{route('departments.update',$department->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">name address</label>
            <input type="text" name="title" value="{{isset($department->title) ? $department->title : null}}"
                   class="form-control" placeholder="name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" name="description" rows="3">{{isset($department->description) ? $department->description : null}}</textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@stop
