<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionClassRequest;
use App\Models\Courses;
use App\Models\Department;
use App\Models\Lecturers;
use App\Models\SectionClass;
use Illuminate\Http\Request;

class SectionClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $section_classes = SectionClass::with([
                'lecturer',
                'course',
            ])
            ->orderBy('section_code', 'desc')
            ->paginate(10);
        return view('admin.section_classes.index', compact('section_classes'));
    }
    
    public function create()
    {
        $courses = Courses::all();
        $lecturers = Lecturers::all();
        return view('admin.section_classes.create',compact('courses','lecturers'));
    }


    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(SectionClassRequest $request)
    {

        SectionClass::create($request->validated());

        return redirect()->route('admin.section_classes.index')
            ->with('success', 'Thêm học phần thành công');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $section_classes = SectionClass::findOrFail($id);
        return view('admin.section_classes.edit', compact('section_classes'));   
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(SectionClassRequest $request, string $id)
    {
        
        $section_classes = SectionClass::findOrFail($id);
        $section_classes->update($request->validated());
        return redirect()->route('admin.section_classes.index')
            ->with('success', 'Cập nhật học phần thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SectionClass::findOrFail($id)->delete();

        return redirect()->route('admin.section_classes.index')
            ->with('success', 'Xóa khoa thành công');
    }
}
