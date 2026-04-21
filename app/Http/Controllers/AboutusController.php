<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Str;

class AboutusController extends Controller
{
 
    public function index()
    {
        $category=About::all();
        return view('backend.aboutus.index')->with('categories',$category);
    }

    public function create()
    {
        // $parent_cats=About::where('is_parent',1)->orderBy('title','ASC')->get();
        return view('backend.aboutus.create');
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|nullable',
        ]);
        $data= $request->all();
        $status=About::create($data);
        if($status){
            request()->session()->flash('success','About Us successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('about.index');


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category=About::findOrFail($id);
        return view('backend.aboutus.edit')->with('category',$category);
    }

    
    public function update(Request $request, $id)
    {
        $category=About::findOrFail($id);
        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|nullable'
        ]);
        $data= $request->all();
        $status=$category->fill($data)->save();
        if($status){
            request()->session()->flash('success','About Us successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('about.index');
    }

    public function destroy($id)
    {
        $category = About::findOrFail($id);
        $status   = $category->delete();

        if($status){
            request()->session()->flash('success','About Us successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting About Us');
        }
        return redirect()->route('about.index');
    }

}
