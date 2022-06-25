<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::
        orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);


        return view('departments.index', [
            'departments' => $departments,
        ]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $validate
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request, $validate,$id)
    {
        $request->validate([
            'name' => 'required|max:10',
            'email' => 'required|unique:users,email,'.$id,
            'password' =>'sometimes',
            'cond_password'=>'sometimes|same:password',
            'conf_password' =>'required|same:password',
            'image'=>'mimes:jpeg,jpg,png,gif|sometimes|max:"10000',
            [],[],[
                'email' => 'الايميل',
                'name' => 'لاسم',
                 'conf_password' =>'تاكيد كلمة المرور',
            ]
        ]);
        if(validate->fails()){
            $smg="تاكيد البيانات المدخلة" ;
            $data=$validate->errors();
            return response()->json(compact("smg","data"),422);


        }

        if ($request->has('title')) {
            $data['title'] = $request->get('title');
        }
        if ($request->has('description')) {
            $data['description'] = $request->get('description');
        }
        Department::create($data);
        return redirect('departments\index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::with([
            'teachers'
        ])->find($id);
        if (is_null($department)) {
            return  redirect()->back();
        }
        return view('departments.show', [
            'department' => $department,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('departments.edit', [
            'department' => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|max:departments',
            'description' => 'required'
        ]);
        if ($request->has('title')) {
            $data['title'] = $request->get('title');
        }
        if ($request->has('description') && strlen($request->get('description')) > 0) {
            $data['description'] = $request->get('description');
        }
        Department::create($data);
        return redirect('departments\index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::where('id', '=', $id)
            ->delete();
        return redirect('departments\index');
    }
}
