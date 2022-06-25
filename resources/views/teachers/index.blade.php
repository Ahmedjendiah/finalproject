@extends('layouts.app')
@section('content')
    <h1 class="text-center">{{$title}}</h1>
    <a href="{{route('teachers.create')}}" class="btn btn-success">Create</a>
    <br>

    <table class="table table-border table-hover">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">NAME</th>
            <th class="text-center">Department</th>
            <th class="text-center">Description</th>
            <th class="text-center">TimeStamp</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Destroy</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teachers)
            <tr>
                <td class="text-center">{{$teachers->id}}</td>
                <td class="text-center">{{$teachers->name}}</td>
                <td class="text-center">
                    @foreach($departments as $department)
                        @if($department->id == $teachers->department_id)
                            <a href="{{route('departments.show',$department->id)}}">{{$department->title}}</a>
                        @endif
                    @endforeach
                </td>
                <td class="text-center">
                    @foreach($departments as $department)
                        @if($department->id == $teachers->department_id)
                            <a >{{ \Illuminate\Support\Str::limit($department->description, 50, $end='...') }}</a>
                        @endif
                    @endforeach
                </td>
                <td class="text-center">{{\Carbon\Carbon::parse($teachers->created_at)->format('d/m/Y')}}</td>
                <td class="text-center"><a class="btn btn-warning" href="{{route('teachers.edit',$teachers->id)}}"><i
                            class="fa fa-edit"></i> </a></td>
                <td class="text-center"><a class="btn btn-danger" href="{{route('teachers.destroy',$teachers->id)}}"><i
                            class="fa fa-trash"></i> </a></td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
