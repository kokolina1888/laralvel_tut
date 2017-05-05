<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

use Corp\Http\Requests;

use Corp\Repositories\SlidersRepository;
use Corp\Repositories\PortfoliosRepository;
use Corp\Repositories\ArticlesRepository;



use Config;

class IndexController extends SiteController
{

    public function __construct(SlidersRepository $s_rep, PortfoliosRepository $p_rep, ArticlesRepository $a_rep) {

        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));
        
        $this->s_rep = $s_rep;
        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;
        
        $this->bar = 'right';

        $this->template = env('THEME').'.index';
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $sliderItems    = $this->getSliders();       
        $sliders        = view(env('THEME').'.slider')->with('sliders', $sliderItems)->render();

        $portfolios = $this->getPortfolio();
        $content    = view(env('THEME').'.content')->with('portfolios', $portfolios)->render(); 

        $articles   = $this->getArticles();

        $this->keywords = 'home page';
        $this->meta_desc = 'home page';
        $this->title = 'Home Page';


        $this->contentRightbar = view(env('THEME').'.indexbar')->with('articles', $articles)->render();

        $this->vars = array_add($this->vars,'sliders', $sliders);
        $this->vars = array_add($this->vars,'content', $content);
        $this->vars = array_add($this->vars,'title', $this->title);
        $this->vars = array_add($this->vars,'keywords', $this->keywords);
        $this->vars = array_add($this->vars,'meta_desc', $this->meta_desc);
        return $this->renderOutput();
    }

     protected function getArticles() {
        $articles = $this->a_rep->get(['title','created_at','img','alias'],Config::get('settings.home_articles_count'));
        
        return $articles;
    }   
    public function getSliders() {

        $sliders = $this->s_rep->get();
        // dd($sliders);
        if($sliders->isEmpty()) {
            return FALSE;
        }
        
        $sliders->transform(function($item,$key) {

            $item->img = Config::get('settings.slider_path').'/'.$item->img;
            return $item;
            
        });
        
        
        return $sliders;
    }  


    public function getPortfolio()
    {
        $portfolio = $this->p_rep->get('*', Config::get('settings.home_port_count'));

        return $portfolio;
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
