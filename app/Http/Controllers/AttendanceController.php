<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Attendances;
use App\Models\Sessions;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    /**
     * Sinh viên scan QR
     */
    public function scan($token)
    {

        $session = Sessions::where('qr_token',$token)->first();

        if(!$session){
            return response()->json([
                'message' => 'QR không hợp lệ'
            ],404);
        }

        // kiểm tra QR hết hạn
        if(now()->greaterThan($session->qr_expired_at)){
            return response()->json([
                'message' => 'QR đã hết hạn'
            ],403);
        }

        $student = auth()->user();

        // kiểm tra đã điểm danh chưa
        $exists = Attendances::where([
            'session_id'=>$session->id,
            'student_id'=>$student->id
        ])->exists();

        if($exists){
            return response()->json([
                'message'=>'Bạn đã điểm danh rồi'
            ]);
        }

        Attendances::create([
            'session_id'=>$session->id,
            'student_id'=>$student->id,
            'status'=>'present',
            'scanned_at'=>now()
        ]);

        return response()->json([
            'message'=>'Điểm danh thành công'
        ]);
    }


    /**
     * Kết thúc session và đánh dấu absent
     */
    public function finalize($sessionId)
    {

        $session = Sessions::with([
            'class.students',
            'attendances'
        ])->findOrFail($sessionId);

        $scanned = $session->attendances
            ->pluck('student_id')
            ->toArray();

        foreach($session->class->students as $student){

            if(!in_array($student->id,$scanned)){

                Attendances::create([
                    'session_id'=>$session->id,
                    'student_id'=>$student->id,
                    'status'=>'absent'
                ]);

            }

        }

        return back()->with('success','Đã cập nhật sinh viên vắng');
    }

}