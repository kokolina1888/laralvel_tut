<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServicesAddRequest;
use App\Http\Requests\ServicesEditRequest;
use App\Service;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $services = Service::all();

     $data = ['title' => 'services'];

     return view('site.services.index', compact('services', 'data'));

 }
 public function adminIndex(){
   $services = Service::all();

   $data = ['title' => 'admin services'];

   return view('admin.services.services', compact('services', 'data'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['title' => 'admin services'];

        return view('admin.services.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicesAddRequest $request)
    {


       $input = $request->except('_token');       
       $service = new Service($input);

       $service->save();                     
       return redirect('admin/services')->with('status', 'New service has been added to the database!');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $service = Service::findOrFail($id);

     return view('site.services.service_show', compact('service'));
 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::where('id', $id)->first();

        $data['title'] = 'admin services';

        return view('admin.services.edit', compact('service', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServicesEditRequest $request, $id)
    {
        $service = Service::findOrFail($id);

        $input = $request->except('_token');

        $service->fill($input);

        if($service->update()){
            return redirect('admin/services')->with('status', 'The service has been updated!');
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
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect('admin/services')->with('status', 'The service has been deleted!');
    }
}
