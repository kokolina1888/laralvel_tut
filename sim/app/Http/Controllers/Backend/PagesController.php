<?php

namespace Sim\Http\Controllers\Backend;

use Sim\Page;
use Illuminate\Http\Request;
use Sim\Http\Requests;

use Baum\MoveNotPossibleException;

class PagesController extends Controller
{

    protected $pages;

    public function __construct(Page $pages)
    {
        $this->pages = $pages;
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pages = $this->pages->all();
        return view('backend.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Page $page)
    {
        $templates = $this->getPageTemplates();
        $pages = $this->pages->where('hidden', false)->orderBy('lft', 'asc')->get();    


        return view('backend.pages.form', compact('page', 'templates', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StorePageRequest $request)
    {
        $this->pages->create($request->only('title', 'url', 'name', 'content', 'template', 'hidden'));
        //$this->updatePageOrder($page, $request);
        return redirect(route('pages.index'))->with('status', 'Page has been created.');
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = $this->pages->findOrFail($id);
        $templates = $this->getPageTemplates();

        $pages = $this->pages->where('hidden', false)->orderBy('lft', 'asc')->get();    


        return view('backend.pages.form', compact('page', 'templates', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdatePageRequest $request, $id)
    {
        $page = $this->pages->findOrFail($id);
if($response = $this->updatePageOrder($page, $request)){
    return $response;
}
        $page->fill($request->only('title', 'url', 'name', 'content', 'template', 'hidden'))->save();

        return redirect(route('pages.edit', $page->id))->with('status', 'Page has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function confirm($id)
    {
        $page = $this->pages->findOrFail($id);

        return view('backend.pages.confirm', compact('page'));
    }

    public function destroy($id)
    {
        $page = $this->pages->findOrFail($id);
        foreach($page->children as $child){
            $child->makeRoot();
        }
        $page->delete();

        return redirect(route('pages.index'))->with('status', 'Page has been deleted');
    }

    protected function getPageTemplates()
    {
        $templates = config('cms.templates');

        return ['' => ''] + array_combine(array_keys($templates), array_keys($templates));
    }

    protected function updatePageOrder(Page $page, Request $request)
    {
        if($request->has('order', 'orderPage')){
            try{
                $page->updateOrder($request->input('order'), $request->input('orderPage'));

            } catch(MoveNotPossibleException $e){
               // redirect()->back()->withErrors(['msg''', 'The Message']);
                return redirect()->back()->withErrors(['error'=>'Cannot make a page a child of itself.']);
            }
        }
    }
}
