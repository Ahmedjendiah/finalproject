@extends('layouts.app')
@section('content')
    <a href="{{route('teachers.index')}}" class="btn btn-primary">Back</a>
    <form action="{{route('teachers.update',$teacher->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">teachers Name</label>
            <input type="text" name="name" value="{{isset($teacher->name) ? $teacher->name : null}}"
                   class="form-control" placeholder="name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Department </label>
            <select name="department_id" class="form-control">
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{$department->id}}" @if($department->id == $teacher->department_id)
                    selected @endif >{{$department->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@stop
