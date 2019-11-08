<div class="col-md-3">

	<h3>{{ 'Tweets' }}</h3>
	<!-- Scripts -->
	<script src="{{ asset('js/jobsitychallenge.js')}}"></script>
	
	<div class="table-responsive">
	    <table class="table">

	        <tbody>

	        {{-- Write tweets --}}
	        @foreach($tweets as $tweet)

	            <tr>
	                <td>{{ $loop->iteration }}</td>

	                <td>
                        {{ $tweet->text }}
                        
                        <br/>

                        {{-- If the tweet is own of authenticated user, then hide link show --}}
		                @if( $tweet->user->screen_name == $twitterUname )

		                	@if( in_array( $tweet->id, $hiddenTweets ) == false )

	                        	<a id="tweet-{{ $tweet->id }}" href="javascript:void(0)" data-tweetid="{{ $tweet->id }}" class="hide-tweet">{{ 'Hide tweet' }}</a>

		                	@else
	                        	
		                		<a id="tweet-{{ $tweet->id }}" href="javascript:void(0)" data-tweetid="{{ $tweet->id }}" class="hide-tweet">{{ 'Un Hide tweet' }}</a>

		                	@endif

		                @endif
	                </td>
	                
	                
	            </tr>
	        @endforeach
	        
	        </tbody>

	    </table>
	    
	</div>

</div>