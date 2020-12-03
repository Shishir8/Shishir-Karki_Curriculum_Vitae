<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'headline_srvc' => 'nullable',
            'title_srvc' => 'required',
            'sub_title_srvc' => 'required',
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
            if (!file_exists('uploads/service'))
            {
                mkdir('uploads/service', 0777 , true);
            }
            $image->move('uploads/service',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $service = new Service();
        $service->headline_srvc = $request->headline_srvc;
        $service->title_srvc = $request->title_srvc;
        $service->sub_title_srvc = $request->sub_title_srvc;
       
        $service->image = $imagename;
        $service->save();
        return redirect()->route('service.index')->with('record_added','Service Successfully Saved');
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
        $service = Service::find($id);
        return view('admin.service.edit',compact('service'));
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
            'headline_srvc' => 'required',
            'title_srvc' => 'required',
            'sub_title_srvc' => 'required',
            
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);


        $image = $request->file('image');
        $slug = str::slug($request->name);
        $service = Service::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. 
            $image->getClientOriginalExtension();
            if (!file_exists('uploads/service'))
            {
                mkdir('uploads/service', 0777 , true);
            }
            $image->move('uploads/service',$imagename);
        }else {
            $imagename = $service->image;
        }
        $service->headline_srvc = $request->headline_srvc;
        $service->title_srvc = $request->title_srvc;
        $service->sub_title_srvc = $request->sub_title_srvc;
       
        $service->image = $imagename;
        $service->save();
        return redirect()->route('service.index')->with('record_added','Service Successfully Saved');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        if (file_exists('uploads/service/'.$service->image))
        {
            unlink('uploads/service/'.$service->image);
        }
        $service->delete();
        return redirect()->back()->with('record_deleted','service Successfully Deleted');
    }
}
