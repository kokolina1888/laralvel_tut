<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Filter;

use App\Http\Requests\PortfoliosAddRequest;
use App\Http\Requests\PortfoliosUpdateRequest;

use File;
use DB;


class PortfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        $tags = DB::table('filters')->distinct()->pluck('name');

        return view('site.portfolios.index', compact('portfolios', 'tags'));
    }

    public function adminIndex()
    {
        $data['title'] = 'admin portfolios';
        $portfolios = Portfolio::all();
        
        return view('admin.portfolios.portfolios', compact('portfolios', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'admin portfolios';
        $tags = Filter::all()->pluck('name', 'id')->toArray();
      
        return view('admin.portfolios.create', compact('data', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfoliosAddRequest $request)
    {
        $input = $request->except('_token');

        
        if($request->hasFile('images')){

            $file = $request->file('images');

            $input['images'] = $file->getClientOriginalName();
            $file->move(public_path().'/assets/user_img', $input['images']);
        }
        
        $portfolio = new Portfolio($input);


        if($portfolio->save()){                      
            return redirect('admin/portfolios')->with('status', 'The portfolio has been added to the database!');
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
        $portfolio = Portfolio::findOrFail($id);
return view('site.portfolios.portfolio_show', compact('portfolio'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $filename = public_path().'\assets\user_img\\'.$portfolio->images;
        File::delete($filename);        

        $portfolio->delete();

        return redirect('admin/portfolios')->with('status', 'The portfolio has been deleted!');
    }
}
