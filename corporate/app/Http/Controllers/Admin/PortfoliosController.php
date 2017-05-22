<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;

use Corp\Repositories\PortfoliosRepository;

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

        //TO DO add filter alias
        
        $this->content = view(env('THEME').'.admin.portfolios_create_content');

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        //
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
        //
    }
}
