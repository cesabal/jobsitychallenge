/**
 * [jobsity description]
 * @type {[type]}
 */
var jobsityTwitterManager = {

	/**
	 * [init description]
	 * @param  {[type]} options [description]
	 * @return {[type]}         [description]
	 */
	init: function( options )
	{
		// add hide-tweet action
		defaultOptions = {
			tweetHideSelector: '.hide'
		}

		// Merge options with defaults
		options = Object.assign( defaultOptions, options );
		
		// Aigns action on click hide tweet link
		$(document).on('click', options.tweetHideSelector, jobsityTwitterManager.hideCallback );

	},

	/**
	 * The function hide a tweet, and store this on database
	 * @param  {jQeuryEvent} event Click event
	 */
	hideCallback: function( event ){

		event.stopPropagation();
		event.preventDefault();

		var hideElementClicked = $(this);
		var elementClickedData = hideElementClicked.data();
		var tweetId = elementClickedData.tweetid;

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		$.ajax({

			type:'POST',
			url:'/ajaxRequest',
			data:{ tweetId:tweetId, action: 'hide' },
			success:function( response )
			{
				response = response || false;

				// if success and tiweetid is returned the tweet hidden
				if( response )
				{
					$( "#tweet-" + tweetId  ).closest('tr').fadeOut();
				}
			}

		});

	},

}

// Excecute init when page is ready
// and init jobsityTwitterManager
// options 
$(function()
{
	jobsityTwitterManager.init(
	{
		tweetHideSelector: '.hide-tweet'
	});
});