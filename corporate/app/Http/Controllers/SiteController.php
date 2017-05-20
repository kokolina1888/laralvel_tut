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
// dd($menu);
        $navigation = view(env('THEME').'.navigation')->with('menu', $menu)->render(); 
// dd($navigation);
        $this->vars = array_add($this->vars,'navigation',$navigation);       

       
        if($this->contentRightbar){

            $rightbar = view(env('THEME').'.rightbar')->with('content_rightbar', $this->contentRightbar)->render();

            $this->vars = array_add($this->vars, 'rightbar', $rightbar);


        }   

         if($this->contentLeftbar){

            $leftbar = view(env('THEME').'.leftbar')->with('content_leftbar', $this->contentLeftbar)->render();

            $this->vars = array_add($this->vars, 'leftbar', $leftbar);


        }      

        $footer = view(env('THEME').'.footer')->render();
        $this->vars = array_add($this->vars,'footer', $footer);        
        $this->vars = array_add($this->vars,'keywords', $this->keywords);
        $this->vars = array_add($this->vars, 'meta_desc', $this->meta_desc);
        $this->vars = array_add($this->vars, 'title', $this->title);
        $this->vars = array_add($this->vars, 'bar', $this->bar);


        return view($this->template)->with($this->vars);
    }




    public function getMenu() 
    {
        $menu = $this->m_rep->get();
// dd($menu);
        $mBuilder = Menu::make('MyNav', function($m) use($menu){

            foreach($menu as $item){
                           
                if($item->parent === 0){

                    $m->add($item->title, $item->path)->id($item->id);
                   
                } else {
 
                    if($m->find($item->parent)){
                        $m->find($item->parent)->add($item->title, $item->path)->id($item->id);
                    }
                }
            }
        });
// dd($mBuilder);
        return $mBuilder;
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

}
