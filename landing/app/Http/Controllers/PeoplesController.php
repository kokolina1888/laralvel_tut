<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\PeoplesAddRequest;
use App\Http\Requests\PeoplesEditRequest;
use App\People;
use File;

class PeoplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples = People::all();

        $data = ['title' => 'team'];

        return view('site.peoples.index', compact('peoples', 'data'));

    }
    public function adminIndex(){
       $peoples = People::all();


        $data = ['title' => 'admin team'];
        return view('admin.peoples.peoples', compact('peoples', 'data'));
   
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['title' => 'admin team'];
        return view('admin.peoples.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeoplesAddRequest $request)
    {
        $input = $request->except('_token');


        if($request->hasFile('images')){

            $file = $request->file('images');

            $input['images'] = $file->getClientOriginalName();
            $file->move(public_path().'/assets/user_img', $input['images']);
        }

        $page = new People($input);


        if($page->save()){                      
            return redirect('admin/team')->with('status', 'The new team member has been added to the database!');
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
        $people = People::findOrFail($id);

        return view('site.peoples.people_show', compact('people'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $data = ['title' => 'admin team'];
     $people = People::findOrFail($id);

     return view('admin.peoples.edit', compact('people', 'data'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PeoplesEditRequest $request, $id)
    {
       $people = People::findOrFail($id);

       $input = $request->except('_token', 'images');

       if($request->hasFile('images')){
        $file = $request->file('images');
        $input['images'] = $file->getClientOriginalName();
        $file->move(public_path().'/assets/user_img', $input['images']);
    } else {

        $input['images'] = $input['old_images'];
        
    }


    $people->fill($input);

    if($people->update()){
        $filename = public_path().'\assets\user_img\\'.$input['old_images'];

        File::delete($filename);
        unset($input['old_images']);

        return redirect('admin/team')->with('status', 'The team member has been updated!');
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
        $people = People::findOrFail($id);
        $filename = public_path().'\assets\user_img\\'.$people->images;
        File::delete($filename);        

        $people->delete();

        return redirect('admin/team')->with('status', 'The team member has been deleted!');

    }
}
