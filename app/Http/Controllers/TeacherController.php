<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = null;
        $departments = Department::all();
        if ($request->has('query')) {
            $query = $request->get('query');
        }
        $title = "Hello Teacher";

        $teachers = Teacher::when(isset($query) && strlen($query) > 0,function ($q) use($query){
            $q->where('name', 'like', '%' . $query . '%' );
        })->orderBy('id', 'desc')
            ->orderBy('name', 'desc')
            ->paginate(10);
        return view('teachers.index', [
            'title' => $title,
            'teachers' => $teachers,
            'query' => $query,
            'departments' => $departments
        ]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('teachers.create',[
            'departments' => $departments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('teachers')
            ->insert([
                'name' => $request->get('name'),
                'department_id' => $request->get('department_id'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        return redirect('teachers\index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('teachers.show', [
            'id' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher =Teacher::find($id);
        $departments = Department::all();
        return view('teachers.edit', [
            'teacher' => $teacher,
            'departments' =>$departments
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exist = Teacher::find($id);
        if (isset($exist)) {

            DB::table('teachers')
                ->where('id', '=', $id)
                ->where('name', '!=', null)
                ->update([
                    'name' => $request->get('name'),
                    'department_id' => $request->get('department_id'),
                    'updated_at' => Carbon::now()
                ]);
        }
        return redirect('teachers\index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::where('id','=',$id)
            ->delete();
        return redirect('teachers\index');
    }
}
