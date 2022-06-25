@extends('layouts.app')
@section('content')
    <a href="{{route('teachers.index')}}" class="btn btn-primary">Back</a>
    <form action="{{route('teachers.store')}}" method="post">
        @method('POST')
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">name address</label>
            <input type="text" name="name" class="form-control" placeholder="name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Department</label>
            <select name="department_id" class="form-control">
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@stop
