<?php

namespace App\Http\Controllers;


use App\Http\Requests\NotificationRequest;

use App\Models\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $notifications= Notifications::when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', "%$keyword%")
                ->orWhere('id', 'like', "%$keyword%")
                ->orWhere('code', 'like', "%$keyword%");
        })
        ->paginate(10);
        return view('admin.notifications.index', compact('notifications'));
    }
    
    public function create()
    {
        return view('admin.notifications.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificationRequest $request)
    {
            DB::transaction(function () use ($request) {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('public/photos', $fileName);
            }
            Notifications::create([
                'title' => $request->title,
                'content' => $request->content,
                'photo' => isset($filePath) ? $filePath : null
            ]);


        });

        return back()->with('success', 'OK');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $notification = Notifications::findOrFail($id);
        return view('admin.notifications.edit', compact('notification'));   
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(NotificationRequest $request, string $id)
    {

        $notification = Notifications::findOrFail($id);
        $notification->update($request->validated());
        return redirect()->route('admin.notifications.index')
            ->with('success', 'Cập nhật thông báo thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Notifications::findOrFail($id)->delete();

        return redirect()->route('admin.notifications.index')
            ->with('success', 'Xóa thông báo thành công');
    }
}
