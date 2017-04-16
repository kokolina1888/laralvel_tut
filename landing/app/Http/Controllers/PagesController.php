<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Page;
use App\User;
use App\Http\Requests\PagesAddRequest;
use App\Http\Requests\PagesEditRequest;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $pages = Page::all();
        
        
        $data = ['title' => 'pages'];

        return view('site.pages.index', compact('pages', 'data'));
        
    }

    public function adminIndex(){
        $pages = Page::all();

        $data = ['title' => 'admin pages'];
        return view('admin.pages.pages', compact('pages', 'data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['title' => 'admin pages'];
        return view('admin.pages.create', compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PagesAddRequest $request){


        $input = $request->except('_token');

        
        if($request->hasFile('images')){

            $file = $request->file('images');

            $input['images'] = $file->getClientOriginalName();
            $file->move(public_path().'/assets/user_img', $input['images']);
        }
        
        $page = new Page($input);


        if($page->save()){                      
            return redirect('admin')->with('status', 'The page has been added to the database!');
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::where('alias', $id)->get()->first();

        return view('site.pages.page_show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Page::findOrFail($id);
        
        return view('admin.pages.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PagesEditRequest $request, $page){

        $page = Page::findOrFail($page);

        $input = $request->except('_token', 'images');
      
        if($request->hasFile('images')){
            $file = $request->file('images');
            $input['images'] = $file->getClientOriginalName();
            $file->move(public_path().'/assets/user_img', $input['images']);
        } else {
            $input['images'] = $input['old_images'];
        }

        unset($input['old_images']);

        $page->fill($input);

        if($page->update()){
            return redirect('admin')->with('status', 'The page has been updated!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $page = Page::findOrFail($id);
     $page->delete();

     return redirect('admin')->with('status', 'The page has been deleted');

 }
}
