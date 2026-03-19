<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;

use App\Models\Classes;
use App\Models\Department;
use App\Models\Students;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function index(Request $request)
        {
            $query = Students::with(['class','department']);

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
            $students = $query->paginate(10);
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
        
            $classes = Classes::all();
            $departments = Department::all();
        return view('admin.students.create', compact('classes', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(StudentRequest $request)
{
    try {

        DB::transaction(function () use ($request) {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('public/photos', $fileName);
            }

            $birthdayPassword = Carbon::parse($request->birthday)
                        ->format('dmY');
            $user = User::create([
                'email' => $request->email,
                'password' => $birthdayPassword,
                'role' => 'student',
            ]);

            Students::create([
                'user_id' => $user->id,
                'student_code' => $request->student_code,
                'name' => $request->name,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'academic_year' => $request->academic_year,
                'phone' => $request->phone,
                'identity_number' => $request->identity_number,
                'place_of_birth' => $request->place_of_birth,
                'permanent_address' => $request->permanent_address,
                'class_id' => $request->class_id,
                'department_id' => $request->department_id,
                'photo' => $filePath ?? null,
            ]);

        });

        return back()->with('success', 'OK');

    } catch (\Exception $e) {
        dd($e->getMessage());
    }
}
    public function show($id)
    {
        $student = Students::with(['user','class','department'])
            ->findOrFail($id);

        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Students::findOrFail($id);
        $classes = Classes::all();
        $departments = Department::all();
        return view('admin.students.edit', compact('student', 'classes', 'departments'));   
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(StudentRequest $request, string $id)
    {
        $student = Students::findOrFail($id);

        DB::transaction(function () use ($request, $student) {

            // 1️⃣ Update user
            $student->user->update([
                'name'  => $request->name,
                'email' => $request->email,
            ]);

            // 2️⃣ Update student profile
            $student->update([
                'student_code'      => $request->student_code,
                'birthday'          => $request->birthday,
                'gender'            => $request->gender,
                'academic_year'     => $request->academic_year,
                'phone'             => $request->phone,
                'identity_number'   => $request->identity_number,
                'place_of_birth'    => $request->place_of_birth,
                'permanent_address' => $request->permanent_address,
                'class_id'          => $request->class_id,
                'department_id'     => $request->department_id,
            ]);
        });

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Cập nhật sinh viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Students::findOrFail($id)->delete();

        return redirect()->route('admin.students.index')
            ->with('success', 'Xóa sinh viên thành công');
    }
}
