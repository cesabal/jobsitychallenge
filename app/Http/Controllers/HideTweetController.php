<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\hidden_tweets as HiddenTweets;

class HideTweetController extends Controller
{
    /**
     * Create a new controller instance.
     * this function add tweet to hide base table
     *
     * @return void
     */
    public function ajaxRequest( Request $request )
    {
    	// Get the currently authenticated user's ID...
        $userId = Auth::id();
        $tweetId = $request->get('tweetId');
        $action = $request->get('action');

        // if hide, then hide and add record, if unhide tweet then delete record
        switch ( $action ) {
        	case 'hide':
        		
		        // Create hide register if not exist
				$response = HiddenTweets::firstOrCreate(
					['tweetid' => $tweetId],
					['userid' => 1, $userId]
				);

        		break;
        	
        	case 'unhide':
        		$response = HiddenTweets::where('tweetid', $tweetId)->delete();
        		break;
        }

        return response()->json($response);
    }


}
