<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terms;
use Illuminate\Support\Str;

class TermsController extends Controller
{
 
    public function index()
    {
        $category=Terms::all();
        return view('backend.Terms.index')->with('categories',$category);
    }

    public function create()
    {
        // $parent_cats=Terms::where('is_parent',1)->orderBy('title','ASC')->get();
        return view('backend.Terms.create');
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|nullable',
        ]);
        $data= $request->all();
        $status=Terms::create($data);
        if($status){
            request()->session()->flash('success','Terms&Condition successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('terms.index');


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category=Terms::findOrFail($id);
        return view('backend.terms.edit')->with('category',$category);
    }

    
    public function update(Request $request, $id)
    {
        $category=Terms::findOrFail($id);
        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|nullable'
        ]);
        $data= $request->all();
        $status=$category->fill($data)->save();
        if($status){
            request()->session()->flash('success','Terms & Condition successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('terms.index');
    }

    public function destroy($id)
    {
        $category = Terms::findOrFail($id);
        $status   = $category->delete();

        if($status){
            request()->session()->flash('success','Terms & Condition successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting Terms & Condition');
        }
        return redirect()->route('terms.index');
    }

}
