<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Request as Req;
use App\News;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function getNews()
    {
        $newsCollection = News::orderBy('created_at', 'desc')->get();
        $news = new Collection();

        foreach($newsCollection as $new)
        {
            $date =Carbon::parse($new->created_at);
            $news->push([
                'author'=>$new->author()->first()->name,
                'heading'=>$new->heading,
                'content'=>$new->text,
                'date'=>$date->format('d.m.Y'),
                'time'=>$date->toTimeString(),
                'comments'=>$new->comments()->get()
            ]);


        }
//        dd($news);
        return view('news',compact('news'));
    }

    public function newNews(Req $request)
    {
//        dd( $request->except('_token'));
        $input = $request->except('_token');
        News::create([
            'user_id' => Auth::user()->id,
            'heading'=> $input['heading'],
            'text'=>$input['content']
        ]);

        return redirect()->back();
    }

    public function getEvents()
    {
        return view('events');
    }

    public function getFinanzen()
    {
        return view('finanzen');
    }

    public function getVote()
    {
        return view('vote');
    }


    public function getFeed(Request $request)
    {
//        dd($request->all());
        $from = Carbon::parse($request->input('start'));
        $to = Carbon::parse($request->input('end'));

        $events = Event::where('start','>=',$from->toDateString())
                        ->where('end','<=',$to->toDateString())
                        ->get();

        return response()->json($events);
    }

}
