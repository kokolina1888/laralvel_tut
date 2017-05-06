<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

use Corp\Repositories\PortfoliosRepository;
use Corp\Repositories\MenusRepository;
use Corp\Menu;

class PortfoliosController extends SiteController
{


    public function __construct(PortfoliosRepository $p_rep) {

        parent::__construct(new \Corp\Repositories\MenusRepository(new Menu));

        $this->p_rep = $p_rep;

        $this->template = env('THEME').'.portfolios';

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ADD TITLE!



     $this->title = 'Portfolios';
     $this->keywords = 'Portfolios';
     $this->meta_desc = 'Portfolios';

     $portfolios = $this->getPortfolios();

     $content = view(env('THEME').'.portfolios_content')->with('portfolios', $portfolios)->render();
     $this->vars = array_add($this->vars,'content',$content);



     return $this->renderOutput();
 }

 public function getPortfolios() {
    $portfolios = $this->p_rep->get('*',FALSE,TRUE);
    if($portfolios) {
        $portfolios->load('filter');
    }
    
    return $portfolios;
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
