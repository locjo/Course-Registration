<?php

namespace App\Http\Controllers;

use App\Http\Requests\LecturerRequest;
use App\Http\Requests\StudentRequest;

use App\Models\Classes;
use App\Models\Department;
use App\Models\Lecturers;
use App\Models\Students;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function index(Request $request)
        {
            $query = Lecturers::with(['class','department']);

            // ===== Filter mã giảng viên =====
            if ($request->lecturer_code) {
                $query->where('lecturer_code','like','%'.$request->lecturer_code.'%');
            }
            // ===== Filter tên giảng viên =====
            if ($request->lecturer_name) {
                $query->where('name','like','%'.$request->lecturer_name.'%');
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
            $lecturers = $query->paginate(10);
            $classes = Classes::orderBy('code')->get();
            $departments = Department::orderBy('code')->get();

            return view('admin.lecturers.index', compact(
                'lecturers',
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
        return view('admin.lecturers.create', compact('classes', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(LecturerRequest $request)
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
                'name' => $request->name,
                'email' => $request->email,
                'password' => $birthdayPassword,
                'role' => 'lecturer',
            ]);

            Lecturers::create([
                'user_id' => $user->id,
                'lecturer_code' => $request->lecturer_code,
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
        $lecturer = Lecturers::with(['user','class','department'])
            ->findOrFail($id);

        return view('admin.lecturers.show', compact('lecturer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lecturer = Lecturers::findOrFail($id);
        $classes = Classes::all();
        $departments = Department::all();
        return view('admin.lecturers.edit', compact('lecturer', 'classes', 'departments'));   
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(LecturerRequest $request, string $id)
    {
        $lecturer = Lecturers::findOrFail($id);

        DB::transaction(function () use ($request, $lecturer) {

            // 1️⃣ Update user
            $lecturer->user->update([
                'name'  => $request->name,
                'email' => $request->email,
            ]);

            // 2️⃣ Update lecturer profile
            $lecturer->update([
                'lecturer_code'      => $request->lecturer_code,
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
            ->route('admin.lecturers.index')
            ->with('success', 'Cập nhật giảng viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lecturers::findOrFail($id)->delete();

        return redirect()->route('admin.lecturers.index')
            ->with('success', 'Xóa giảng viên thành công');
    }
}
