<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;

use Corp\Http\Requests\PortfolioRequest;

use Corp\Repositories\PortfoliosRepository;

use Corp\Portfolio;
use Corp\Filter;

use Auth;
use Gate;


class PortfoliosController extends AdminController
{
    public function __construct(PortfoliosRepository $p_rep) {
        
        parent::__construct();
        
        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();

            if(Gate::denies('view_admin_portfolios')){
                abort(404);
            }

            return $next($request);
        });
        
        $this->p_rep = $p_rep;
        
        $this->template = env('THEME').'.admin.portfolios';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = 'Admin portfolios';

        $portfolios = $this->getPortfolios();

        $this->content = view(env('THEME').'.admin.portfolios_content')->with('portfolios', $portfolios);

        return $this->renderOutput();
    }

    public function getPortfolios()
    {
        return $this->p_rep->get();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       if(Gate::denies('save', new Portfolio)){
            abort(404);
        }

        $this->title = 'Add Portfolio';

        $filters = Filter::select(['id', 'title','alias'])->get();
        // dd($filters);
        
        $list_filters = [];
        foreach($filters as $filter){
            
                $list_filters[$filter->alias] = $filter->title;
           }

        // $lists = [['one', 'two'], ['two', 'three']];
        //dd($list_filters);
        $this->content = view(env('THEME').'.admin.portfolios_create_content')->with('filters', $list_filters);

        return $this->renderOutput();    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        $result = $this->p_rep->addPortfolio($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        
        return redirect('/admin')->with($result);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($alias)
    {
    
        if(Gate::denies('edit', new Portfolio)){
            abort(404);
        }
        $portfolio = Portfolio::where('alias', $alias)->first();
       
        $portfolio->img = json_decode($portfolio->img);
         $filters = Filter::select(['id', 'title','alias'])->get();
        // dd($filters);
        
        $list_filters = [];
        foreach($filters as $filter){
            
                $list_filters[$filter->alias] = $filter->title;
           }

        $this->title = 'Edit Portfolio ' . $portfolio->title;
        $this->content = view(env('THEME').'.admin.portfolios_create_content')->with(['filters'=>$list_filters, 'portfolio'=>$portfolio]);

        return $this->renderOutput();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioRequest $request, $alias)
    {
        $portfolio = Portfolio::where('alias', $alias)->first();

        $result = $this->p_rep->updatePortfolio($request, $portfolio);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        
        return redirect('/admin')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($alias)
{
        $portfolio = Portfolio::where('alias', $alias)->first();

     $result = $this->p_rep->deletePortfolio($portfolio);
        
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        
        return redirect('/admin')->with($result);
}

}
