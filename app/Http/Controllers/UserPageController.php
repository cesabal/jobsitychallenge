<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Entry;
use App\hidden_tweets as HiddenTweets;

class UserPageController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index( $uid )
    {
    	$user = User::where( 'id', $uid )->first();

    	// Need the tweeter user name for the user page 
    	$twitterUname = "";
        $twitterUname = $user->twitter_username;

    	$entries = Entry::where('author', '=', $uid)->paginate( 3 );

    	// First must obtain, a list of hidden tweets    
        $hiddenTweets = [];
        $hiddenTweetsQuery = HiddenTweets::all();

        foreach ( $hiddenTweetsQuery as $hiddenTweet )
        {
            $hiddenTweets[] = $hiddenTweet->tweetid;
        }

        $tweets = \Twitter::getUserTimeline(['screen_name' => $twitterUname, 'count' => 20, 'format' => 'object']);

        // this fix, the user on sidebar to not show links ti hide tweet
        $twitterUname = '';
        
        // Second this list filtering the actually tweets list
        foreach( $tweets as $key => $tweet )
        {
            if( in_array( $tweet->id, $hiddenTweets ) )
            {
                unset( $tweets[$key] );
            }
        }

        // Enable side bar on this view
        $sidebar = true;

    	return view('user.index', compact('user', 'entries', 'tweets', 'sidebar', 'uid', 'twitterUname', 'hiddenTweets' ));

    }
}
