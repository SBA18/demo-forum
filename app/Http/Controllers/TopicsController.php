<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Reply;
use App\User;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TopicsController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();

        $topic_counter = Topic::get()->count();

        $replies_counter = Reply::get()->count();

        $users_counter = User::get()->count();

        // $lastresponse = Reply::latest()->first();

        // dd($lastresponse);

        return view('topics.index', compact('topics', 'topic_counter', 'replies_counter', 'users_counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|max:60|min:5',
            'message' => 'required|min:10',
        ]);

        $topic = Topic::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'slug' => preg_replace('/\s+/', '-', $request->title),
            'message' => $request->message,
            
        ]);

        return redirect()->route('topics.show', compact('topic'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {

        $reply_counter = Reply::where('topic_id', $topic->id)->count();
        // dd($reply_counter);
        // $replies = Reply::paginate(10);

        return view('topics.show', compact('topic', 'reply_counter', 'replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        return view('topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        // dd($request->all());


        $this->validate(request(), [
            'title' => 'required|max:60|min:5',
            'message' => 'required|min:10',
        ]);


        $topic->title = request('title');
        $topic->slug = preg_replace('/\s+/', '-', request('title'));
        $topic->message = request('message');
        
        $topic->save();

        return redirect()->route('topics.show', $topic);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('topics.index');
    }
}
