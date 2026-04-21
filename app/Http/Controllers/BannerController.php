<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Str;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner=Banner::orderBy('id','DESC')->paginate(10);
        return view('backend.banner.index')->with('banners',$banner);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'title'=>'required|max:50',
            'description'=>'nullable',
            'photo'=>'required',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('frontend/banner'), $fileName);
            $data['photo'] = 'frontend/banner/' . $fileName;
        }
        $slug=Str::slug($request->title);
        $count=Banner::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug'] = $slug;
        $status=Banner::create($data);
        if($status){
            request()->session()->flash('success','Banner successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred while adding banner');
        }
        return redirect()->route('banner.index');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $banner=Banner::findOrFail($id);
        return view('backend.banner.edit')->with('banner',$banner);
    }

    public function update(Request $request, $id)
    {

        $banner=Banner::findOrFail($id);
        $this->validate($request,[
            'title'=>'required|max:50',
            'description'=>'nullable',
            'photo'=>'required',
            'category'=>'required',
            'status'=>'required|in:active,inactive',
        ]);
        $data= $request->all();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('frontend/banner'), $fileName);
            $data['photo'] = 'frontend/banner/' . $fileName;
        }
        
        if ($request->hasFile('mobile_banner')) {
            $mobile_banner = $request->file('mobile_banner');
            $mobile_banner_file = time() . '.' . $mobile_banner->getClientOriginalExtension();
            $mobile_banner->move(public_path('frontend/mobile_banner'), $mobile_banner_file);
            $data['mobile_banner'] = 'frontend/mobile_banner/' . $mobile_banner_file;
        }
        $data['category'] = $request->category;
        $status=$banner->fill($data)->save();
        if($status){
            request()->session()->flash('success','Banner successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred while updating banner');
        }
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner=Banner::findOrFail($id);
        $status=$banner->delete();
        if($status){
            request()->session()->flash('success','Banner successfully deleted');
        }
        else{
            request()->session()->flash('error','Error occurred while deleting banner');
        }
        return redirect()->route('banner.index');
    }
}
