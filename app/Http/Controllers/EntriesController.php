<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entry;
use App\User;
use App\hidden_tweets as HiddenTweets;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Twitter;

class EntriesController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Apply security auth middleware conditions
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // declare tweets and hiddenTeewts vars
        $tweets = [];

        // Get the currently authenticated user...
        $user = Auth::user();

        // Get the currently authenticated user's ID...
        $userId = Auth::id();
        
        // The words to search
        $keyword = $request->get('search');

        // Paginate this total
        $perPage = 3;

        // This is for sidebar fix, the var is used to generate the hide- un-hide links
        $twitterUname = '';
        $tweets = \Twitter::getSearch(['q' => 'jobsitychallenge', 'count' => 20, 'format' => 'object']);
        $tweets = $tweets->statuses;

        // First must obtain, a list of hidden tweets    
        $hiddenTweets = [];
        $hiddenTweetsQuery = HiddenTweets::all();

        foreach ( $hiddenTweetsQuery as $hiddenTweet )
        {
            $hiddenTweets[] = $hiddenTweet->tweetid;
        }

        // Second this list filtering the actually tweets list
        foreach( $tweets as $key => $tweet )
        {
            if( in_array( $tweet->id, $hiddenTweets ) )
            {
                unset( $tweets[$key] );
            }
        }

        // Search content by keyword, apply on tittle, content and author fields
        if (!empty($keyword))
        {
            $entries = Entry::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('author', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        }
        else
        {
            $entries = Entry::latest()->paginate( 3 );
        }

        // Obtain name of author's entries
        foreach( $entries as $entry )
        {
            $user = User::where( 'id', $entry->author )->first();
            $entry->username = $user->name;
        }

        

        // Determine if display or nor sidebar
        $sidebar = true;

        return view('entries.index', compact('entries', 'userId', 'sidebar', 'tweets', 'twitterUname' ) );
        
    }


    /**
     * Display a listing of the resource for specific Autenticated user
     *
     * @return \Illuminate\View\View
     */
    public function entriesByUser(Request $request)
    {
        // declare tweets and hiddenTeewts vars
        $tweets = [];
        $hiddenTweets = [];

        // get tweets of Autenticated user
        $twitterUname = Auth::user()->twitter_username;
        
        if( $twitterUname )
        {
            $tweets = \Twitter::getUserTimeline(['screen_name' => $twitterUname, 'count' => 20, 'format' => 'object']);
        }
        
        // Get the currently authenticated user's ID...
        $userId = Auth::id();

        // Obtain a hidden tweets list, for this user
        $hiddenTweetsQuery = HiddenTweets::where('userid', $userId)->get();

        foreach ( $hiddenTweetsQuery as $hiddenTweet )
        {
            $hiddenTweets[] = $hiddenTweet->tweetid;
        }

        // Entries per page
        $perPage = 3;
        
        // Get entries for authenticated user
        $entries = Entry::where('author', '=', "$userId")->paginate($perPage);
        
        // Enable side bar on this view
        $sidebar = true;

        return view('entries.index', compact('entries', 'userId', 'sidebar', 'tweets', 'twitterUname', 'hiddenTweets' ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('entries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:20'
        ]);

        $requestData = $request->all();

        // Get the currently authenticated user...
        $user = Auth::user();

        // Get the currently authenticated user's ID...
        $userId = Auth::id();

        $requestData['author'] = $userId;
        
        Entry::create($requestData);

        return redirect('entries')->with('flash_message', 'Entry added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Get the currently authenticated user...
        $user = Auth::user();

        // Get the currently authenticated user's ID...
        $userId = Auth::id();

        $entry = Entry::findOrFail($id);

        return view('entries.show', compact('entry', 'userId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $entry = Entry::findOrFail($id);

        return view('entries.edit', compact('entry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'title' => 'required|max:20'
		]);
        $requestData = $request->all();
        
        $entry = Entry::findOrFail($id);
        $entry->update($requestData);

        return redirect('entries')->with('flash_message', 'Entry updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Entry::destroy($id);

        return redirect('entries')->with('flash_message', 'Entry deleted!');
    }
}
