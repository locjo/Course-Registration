<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function index(Request $request)
        {
            $query = User::with(['class','department']);

            // ===== Filter mã sinh viên =====
            if ($request->student_code) {
                $query->where('code','like','%'.$request->student_code.'%');
            }

            // ===== Filter tên sinh viên =====
            if ($request->student_name) {
                $query->where('name','like','%'.$request->student_name.'%');
            }

            // ===== Filter từ ngày sinh =====
            if ($request->from_date) {
                $query->whereDate('birthday','>=',$request->from_date);
            }


            // ===== Filter lớp =====
            if ($request->class_id) {
                $query->where('class_id',$request->class_id);
            }

            // ===== Filter khoa =====
            if ($request->department_id) {
                $query->where('department_id',$request->department_id);
            }


             // Lấy danh sách lớp và khoa để hiển thị trong filter
            $students = $query->where('role', 'student')->paginate(10);
            $classes = Classes::orderBy('code')->get();
            $departments = Department::orderBy('code')->get();

            return view('admin.students.index', compact(
                'students',
                'classes',
                'departments'
            ));
        }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
