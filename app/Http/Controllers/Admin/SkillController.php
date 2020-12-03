<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use Session;
use Illuminate\Support\Str;
class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skill.index',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'html' => 'required',
            'css' => 'required',
            'laravel' => 'required',
            'java' => 'required'

        ]);
        $skill = new Skill();
        $skill->html = $request->html;
        $skill->css = $request->css;
        $skill->laravel = $request->laravel;
        $skill->java = $request->java;
        $skill->save();
        Session::flash('success','Messsage Send successfully!');
        return redirect()->route('skill.index')->with('record_added','Skills data Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::find($id);
        return view('admin.skill.edit',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'html' => 'required',
            'css' => 'required',
            'laravel' => 'required',
            'java' => 'required'

        ]);
        $slug = str::slug($request->name);
        $skill = Skill::find($id);
        $skill->html = $request->html;
        $skill->css = $request->css;
        $skill->laravel = $request->laravel;
        $skill->java = $request->java;
        $skill->save();
        Session::flash('success','Messsage Send successfully!');
        return redirect()->route('skill.index')->with('record_updated','Skills data Successfully Saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return redirect()->back()->with('record_deleted','skill Successfully Deleted');
    }
}
