@extends('layouts.app')
@section('content')

    <a href="{{route('departments.create')}}" class="btn btn-success">Create</a>
    <br>
    <form method="get" action="{{route('departments.index')}}">
        @method('get')
        @csrf

    </form>
    <div class="container">


    </div>
    <table class="table table-border table-striped">
        <thead>
        <tr>
            <th width="5%" class="text-center">ID</th>
            <th width="15%" class="text-center">title</th>
            <th class="text-center">description</th>
            <th width="10%" class="text-center">Created At</th>
            <th class="text-center">Edit</th>
            <th width="10%" class="text-center">Destroy</th>
        </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
            <tr>
                <td class="text-center">{{$department->id}}</td>
                <td class="text-center"><a href="{{route('departments.show',$department->id)}}">{{$department->title}}</a> </td>
                <td class="text-center">{{ \Illuminate\Support\Str::limit($department->description, 50, $end='...') }}</td>
                <td class="text-center">{{\Carbon\Carbon::parse($department->created_at)->format('d/m/Y')}}</td>
                <td class="text-center"><a class="btn btn-warning" href="{{route('departments.edit',$department->id)}}"><i
                            class="fa fa-edit"></i> </a></td>
                <td class="text-center"><a class="btn btn-danger" href="{{route('departments.destroy',$department->id)}}"><i
                            class="fa fa-trash"></i> </a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--        {{$teachers->links()}}--}}
@endsection
