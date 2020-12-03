<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aboutme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutmeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutmes = Aboutme::all();
        return view('admin.aboutme.index',compact('aboutmes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutme.create');
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
            'name' => 'required',
            'email' => 'required',
            'profile' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'website' => 'required',
            'address' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);


        $image = $request->file('image');
        $slug = str::slug($request->name);
        // $slider = Slider::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. 
            $image->getClientOriginalExtension();
            if (!file_exists('uploads/aboutme'))
            {
                mkdir('uploads/aboutme', 0777 , true);
            }
            $image->move('uploads/aboutme',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $aboutme = new Aboutme();
        $aboutme->name = $request->name;
        $aboutme->email = $request->email;
        $aboutme->profile = $request->profile;
        $aboutme->phone = $request->phone;
        $aboutme->country = $request->country;
        $aboutme->website = $request->website;
        $aboutme->address = $request->address;
        $aboutme->description = $request->description;
        $aboutme->image = $imagename;
        $aboutme->save();
        return redirect()->route('aboutme.index')->with('record_added','Slider Successfully Saved');
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
        $aboutme = Aboutme::find($id);
        return view('admin.aboutme.edit',compact('aboutme'));
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
            'name' => 'required',
            'email' => 'required',
            'profile' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'website' => 'required',
            'address' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);


        $image = $request->file('image');
        $slug = str::slug($request->name);
        $aboutme = Aboutme::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. 
            $image->getClientOriginalExtension();
            if (!file_exists('uploads/aboutme'))
            {
                mkdir('uploads/aboutme', 0777 , true);
            }
            $image->move('uploads/aboutme',$imagename);
        }else {
            $imagename = $about->image;
        }
        
        $aboutme->name = $request->name;
        $aboutme->email = $request->email;
        $aboutme->profile = $request->profile;
        $aboutme->phone = $request->phone;
        $aboutme->country = $request->country;
        $aboutme->website = $request->website;
        $aboutme->address = $request->address;
        $aboutme->description = $request->description;
        $aboutme->image = $imagename;
        $aboutme->save();
        return redirect()->route('aboutme.index')->with('record_updated','Slider Successfully Saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutme = Aboutme::find($id);
        if (file_exists('uploads/aboutme/'.$aboutme->image))
        {
            unlink('uploads/aboutme/'.$aboutme->image);
        }
        $aboutme->delete();
        return redirect()->back()->with('record_deleted','Aboutme Successfully Deleted');
    }
}