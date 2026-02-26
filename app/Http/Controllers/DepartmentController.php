<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $departments = Department::when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', "%$keyword%")
                ->orWhere('id', 'like', "%$keyword%");
        })
        ->latest()
        ->paginate(10);
        return view('admin.departments.index', compact('departments'));
    }
    
    public function create()
    {
        return view('admin.departments.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:departments',
            'name' => 'required'
        ]);

        Department::create($request->all());

        return redirect()->route('admin.departments.index')
            ->with('success', 'Thêm khoa thành công');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::findOrFail($id);
        return view('admin.departments.edit', compact('department'));   
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code' => 'required|unique:departments,code,' . $id,
            'name' => 'required'
        ]);
        Department::findOrFail($id)
            ->update($request->all());
        
        return redirect()->route('departments.index')
            ->with('success', 'Cập nhật khoa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Department::findOrFail($id)->delete();

        return redirect()->route('admin.departments.index')
            ->with('success', 'Xóa khoa thành công');
    }
}
