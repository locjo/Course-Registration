<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRequest;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $classes = Classes::when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', "%$keyword%")
                ->orWhere('id', 'like', "%$keyword%");
        })
        ->paginate(10);
        return view('admin.classes.index', compact('classes'));
    }
    
    public function create()
    {
        return view('admin.classes.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassRequest $request)
    {
        Classes::create($request->validated());

        return redirect()->route('admin.classes.index')
            ->with('success', 'Thêm lớp học thành công');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Classes::findOrFail($id);
        return view('admin.classes.edit', compact('class'));   
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(ClassRequest $request, string $id)
    {
        
        $class = Classes::findOrFail($id);
        $class->update($request->validated());
        
        return redirect()->route('admin.classes.index')
            ->with('success', 'Cập nhật lớp học thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classes::findOrFail($id)->delete();

        return redirect()->route('admin.classes.index')
            ->with('success', 'Xóa lớp học thành công');
    }
}
