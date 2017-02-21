<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Author;
use App\Quotes;

use App\Events\QuoteCreated;
use Illuminate\Support\Facades\Event;


use App\AuthorLog;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex($author = NULL)
    {

        if (!is_null($author)) {
            $quotes_author = Author::where('name', $author)->first();
            $quotes = $quotes_author->quotes()->orderBy('created_at', 'desc')->paginate(6);
        } else {
         $quotes = Quotes::orderBy('created_at', 'desc')->paginate(6);

     }


     return view('index', ['quotes'=>$quotes]);
 }
 public function getMailCallback($author_name){
    $author_log = new AuthorLog;
    $author_log->author = $author_name;
    $author_log->save();

    return view('email.callback', ['author'=>$author_name]);
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
    public function postQuote(Request $request)
    {
        $this->validate($request, [
            'author'=>'required|max:60|alpha', 
            'quote'=>'required|max:500',
            'email'=>'required',
            ]);
        $authorText = $request['author'];
        $quote = $request['quote'];
        $email = $request['email'];

        $author = Author::where('name', $authorText)->first();

        if (!$author) {
            $author = new Author();
            $author->name = $authorText;
            $author->email = $email;
            $author->save();
        }

        $quote = new Quotes();
        $quote->quote = $request['quote'];
        $author->quotes()->save($quote);
        
        // $author->email = $email;
        // $author->save();

        Event::fire(new QuoteCreated($author));

        return redirect()->route('index')->withMessage('Quote Saved');
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
    public function getDelete($quote_id)
    {
     $author_deleted = false;
     $quote = Quotes::find($quote_id);

     $author = $quote->author->id;
     $quotes = Quotes::where('author_id', $author)->get();

     if (count($quotes)===1) {
         $quote->author->delete();
         $author_deleted = true;
     }
     $quote->delete();
     $msg = $author_deleted?'Quote author deleted':'Quote deleted';
     return redirect()->route('index')->withMessage($msg);
 }

}

