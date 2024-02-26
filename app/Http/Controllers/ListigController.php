<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use User;

class ListigController extends Controller
{
    public function index(){
        $listings = Listing::latest()->filter(request(['tag', 'search']))->paginate(20);
        return view('index', compact('listings'));
    }
    public function show($id){
        $listig = Listing::find($id);
        return view('show', compact('listig'));
    }
    public function create(){
        return view('create');
    }
    public function edit($id){
        $listig = Listing::find($id);
        return view('edit', compact('listig'));
    }

    public function manage(){
        $listings = auth()->user()->listings()->get();
        return view('manage', compact('listings'));
    }
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'company' => 'required',
            'email' => 'required',
            'location' => 'required',
            'website' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('logos', 'public');
        }

        $data['user_id'] = auth()->user()->id;
        Listing::create($data);

        return redirect('/')->with('message', 'Listing created, well done!');
    }
    public function update(Request $request ,Listing $listig){
        $data = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'company' => 'required',
            'email' => 'required',
            'location' => 'required',
            'website' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('logos', 'public');
        }
        $data['user_id'] = auth()->user()->id;
        $listig->update($data);

        return back()->with('message', 'Listing updated, well done!');
    }

    public function delete(Listing $listig){
        $listig->delete();
        return redirect('/')->with('message', 'Listing deleted, well done!');
    }
    
}
