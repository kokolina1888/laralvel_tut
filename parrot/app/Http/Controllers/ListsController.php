<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todolist;
use App\Category;
use App\Http\Requests\ListFormRequest;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Todolist::orderBy('created_at', 'desc')->paginate(10);
        return view('lists.index')->with('lists', $lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       $categories = Category::pluck('name', 'id');
       return view('lists.create')->with('categories', $categories);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(ListFormRequest $request)
    {
        $list = new Todolist(array(
            'name'          =>  $request->get('name'),
            'description'   =>  $request->get('description'),
            'note'          =>  $request->get('note'),


            ));

        $list->save();
        $category = $request->get('categories');
        $cat_desc = $request->get('cat_desc');

        $list->categories()->attach($category);
        // $list->categories()->attach($cat_desc);


        $request->session()->flash('status', 'List has been created successfully!');

        return \Redirect::route('lists.create');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
               $list = Todolist::findOrFail($id);
               return view('lists.show')->with('list', $list);
           
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = Todolist::find($id);
        return view('lists.edit', compact('list', $list));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ListFormRequest $request, $id)
    {
        $list = Todolist::find($id);
        $list->update([
             'name'          => $request->get('name'),
            'description'   => $request->get('description'),
            'note'          => $request->get('note'),
        ]);

        $message = 'your list has been updated.';

        return view('lists.create', compact('message', $message)); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todolist::destroy($id);

        session()->flash('status', 'List has been deleted!');

        return \Redirect::route('lists.index');
    }
}
