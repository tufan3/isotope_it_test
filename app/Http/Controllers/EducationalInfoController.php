<?php

namespace App\Http\Controllers;

use App\Models\EducationalInfo;
use Illuminate\Http\Request;

class EducationalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educationalInfo = EducationalInfo::all();
        return view('index', compact('educationalInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

            $educational_info = new EducationalInfo();
            $educational_info->title = $request->title;
            $educational_info->description = $request->description;
            $educational_info->save();
            return redirect()->route('educational_info.index')->with('success', 'created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $educational_info = EducationalInfo::find($id);
        return view('edit', compact('educational_info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            ]);
            $educational_info = EducationalInfo::find($id);
            $educational_info->title = $request->title;
            $educational_info->description = $request->description;
            $educational_info->save();
            return redirect()->route('educational_info.index')->with('success', 'updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $educational_info = EducationalInfo::where('id',$id)->first();
        $educational_info->delete();
        return redirect()->route('educational_info.index')->with('success', 'deleted successfully');
    }
}
