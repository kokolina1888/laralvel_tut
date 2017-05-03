<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\MenusRepository;
use Menu;


class SiteController extends Controller
{

    protected $p_rep;
    protected $s_rep;
    protected $a_rep;
    protected $m_rep;
    protected $template;
    protected $vars = [];
    protected $bar = FALSE;
    protected $contentRightbar = FALSE;
    protected $contentLeftbar = FALSE;

    protected $keywords;
    protected $meta_desc;
    protected $title;

    public function __construct(MenusRepository $m_rep){

        $this->m_rep = $m_rep;

    }


    public function renderOutput(){

        $menu = $this->getMenu();

        $navigation = view(env('THEME').'.navigation')->with('menu', $menu)->render(); 
        $this->vars = array_add($this->vars,'navigation',$navigation);       

      
        if($this->contentRightbar){

            $rightbar = view(env('THEME').'.rightbar')->with('content_rightbar', $this->contentRightbar)->render();

            $this->vars = array_add($this->vars, 'rightbar', $rightbar);


        }      

        $footer = view(env('THEME').'.footer')->render();
        $this->vars = array_add($this->vars,'footer', $footer);        
        $this->vars = array_add($this->vars,'keywords', $this->keywords);
        $this->vars = array_add($this->vars, 'meta_desc', $this->meta_desc);

        return view($this->template)->with($this->vars);
    }




    public function getMenu() 
    {
        $menu = $this->m_rep->get();

        $mBuilder = Menu::make('MyNav', function($m) use($menu){

            foreach($menu as $item){
                ;                
                if($item->parent_id === 0){

                    $m->add($item->title, $item->path)->id($item->id);
                } else {

                    if($m->find($item->parent_id)){

                        $m->find($item->parent_id)->add($item->title, $item->path)->id($item->id);
                    }
                }
            }
        });

        return $mBuilder;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
