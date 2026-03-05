<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Http\Requests\DepartmentRequest;
use App\Models\Courses;
use App\Models\Department;
use App\Models\Lecturers;
use Illuminate\Http\Request;

class CourseController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $lecturers = Lecturers::orderBy('name')->get();
        $courses = Courses::when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', "%$keyword%")
                ->orWhere('id', 'like', "%$keyword%")
                ->orWhere('code', 'like', "%$keyword%");
        }
        )
        ->paginate(10);
        return view('admin.courses.index', compact('courses', 'lecturers'));
    }
    
    public function create()
    {
        $lecturers = Lecturers::orderBy('name')->get();
        return view('admin.courses.create', compact('lecturers'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {

        Courses::create($request->validated());

        return redirect()->route('admin.courses.index')
            ->with('success', 'Thêm môn học thành công');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Courses::findOrFail($id);
        return view('admin.courses.edit', compact('course'));   
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, string $id)
    {
        
        $course = Courses::findOrFail($id);
        $course->update($request->validated());
        return redirect()->route('admin.courses.index')
            ->with('success', 'Cập nhật môn học thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Courses::findOrFail($id)->delete();

        return redirect()->route('admin.courses.index')
            ->with('success', 'Xóa môn học thành công');
    }
}
