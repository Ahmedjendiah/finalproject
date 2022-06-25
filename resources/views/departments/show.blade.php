@extends('layouts.app')
@section('content')
    <h1 class="text-center">{{$department->title}}</h1>
    <h1 class="text-center">    Count Of Teachers is : {{count($department->teachers)}}</h1>
    <p class="text-left">
        {{$department->description}}
    </p>
    @if(isset($department) && isset($department->teachers) && count($department->teachers) > 0 )
        <div class="list-group">
            @foreach($department->teachers as $teachers)
                <a href="{{route('teachers.edit',$teachers->id)}}" class="list-group-item list-group-item" aria-current="true">
                    {{$teachers->name}}
                </a>
            @endforeach
        </div>
    @else
        <div class="alert alert-danger">No Teacher Found</div>
    @endif
@stop
