<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentRequest;
use App\Models\Courses;
use App\Models\Enrollments;
use App\Models\SectionClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = SectionClass::with('lecturer','course');

        if ($request->course_id) {
                $query->where('course_id',$request->course_id);
            }
        $section_classes = $query->paginate(10);
        
        $courses = Courses::all();
        $enrolledIds = Enrollments::where('student_id', Auth::id())
            ->pluck('section_class_id')
            ->toArray();
        


        return view('student.enrollments.index', compact('section_classes', 'courses', 'enrolledIds'));
        

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnrollmentRequest $request)
    {
        #Check đã đăng ký chưa
        $studentId = Auth::id();
        $sectionClassId = $request->section_class_id;
        $exist = Enrollments::where('student_id', $studentId)
            ->where('section_class_id', $sectionClassId)
            ->exists();
        if ($exist){
            return back()->with('error', 'Bạn đã đăng ký lớp này rồi!');
        }

        #.2 check so luong trong con lai
        $section = SectionClass::findOrFail($sectionClassId);
        $registed_amount = Enrollments::where('section_class_id', $sectionClassId)->count();
        if ($registed_amount >= $section->capacity){
                return back()->with('error', 'Lớp đã đủ số lượng!');
        }

        


        #3.dang ky thanh cong
        Enrollments::create([
            'student_id' => $studentId,
            'section_class_id' => $sectionClassId,
            'status' => 'enrolled',
            'score' => null,
        ]);
        return redirect()->route('student.enrollments.index')
            ->with('success', 'Dang ky thành công'); 
    }

    /**
     * Display the specified resource.
     */

    public function studentsBySection($id)
    {
        
        $students = Enrollments::with('student')
            ->where('section_class_id', $id)
            ->get();
          
        return view('student.enrollments.students', compact('students'));
    }
   public function myEnrollments()
    {
        $enrollments = Enrollments::with('section_class')
            ->where('student_id', Auth::id()) // ✅ đúng chỗ này
            ->get();

        return view('student.enrollments.my', compact('enrollments'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($sectionClassId)
    {
        Enrollments::where('student_id', Auth::id())      #xoa theo lop hoc phan va student
            ->where('section_class_id', $sectionClassId)
            ->delete();

        return redirect()->route('student.enrollments.index')
            ->with('success', 'Hủy học phần thành công');
    }
}
