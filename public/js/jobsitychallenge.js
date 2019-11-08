/**
 * jobsityManager add js functions to manage tweets functionality and display confirm messages
 *
 * The manager use a jqeury plugin to display confirm messages, @see https://github.com/craftpip/jquery-confirm
 * this plugin are integrated on app.blade layout
 * 
 * @type {jobsityManager Object}
 */
var jobsityManager = {

	/**
	 * Initialize object jobsityManager
	 * @param  {Object} options options for this js jobsityManager
	 */
	init: function( options )
	{
		// add hide-tweet action
		defaultOptions = {
			tweetHideSelector: '.hide',
			deleteEntryClass: '.deleteentry'
		}

		// Merge options with defaults
		options = Object.assign( defaultOptions, options );
		
		// Aigns action on click hide tweet link
		$(document).on('click', options.tweetHideSelector, jobsityManager.hideCallback );

		jobsityManager.loadEntriesActions( options );

	},

	loadEntriesActions: function( options )
	{
		// Delete action
		$(document).on('click', options.deleteEntryClass, function( event ){

			event.stopPropagation();
			event.preventDefault();
			var formElement = $(event.target).closest('form');

			// the event must send a form that contain the submition button
			$.confirm({
	            title: "Are you sure to delete?",
	            content: "if you press ok, the content will be delete, are you sure?",
	            type: 'black',
	            buttons: {   
	                ok: {
	                    text: "ok!",
	                    btnClass: 'btn-primary',
	                    keys: ['enter'],
	                    action: function(){
	                         if( typeof formElement != 'undefined' )
	                         {
	                         	formElement.submit();
	                         }
	                    }
	                },
	                cancel: function(){
	                        
	                }
	            }
	        });
		});
		
	},

	/**
	 * The function hide a tweet, and store this on database
	 * this functions use a jquery-confirm plugin @see https://github.com/craftpip/jquery-confirm
	 * @param  {jQeuryEvent} event Click event
	 */
	hideCallback: function( event ){

		event.stopPropagation();
		event.preventDefault();

		var hideElementClicked = $(this);
		var elementClickedData = hideElementClicked.data();
		var tweetId = elementClickedData.tweetid;

		// confirm first after send the request
		jobsityManager.confirm();

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		// Send the tweet hide request 
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

	/**
	 * This function is used to add confirm functionality
	 * with ajax and jquery library
	 * 
	 * @param  {String} message this is a message to display
	 */
	confirm: function( message, content )
	{
		$.confirm({
            title: message,
            content: content,
            type: 'black',
            buttons: {   
                ok: {
                    text: "ok!",
                    btnClass: 'btn-primary',
                    keys: ['enter'],
                    action: function(){
                         console.log('the user clicked confirm');
                    }
                },
                cancel: function(){
                        console.log('the user clicked cancel');
                }
            }
        });
	},

	/**
	 * This function confirm delete entry
	 */
	deleteEntry: function()
	{

	}

}

// Excecute init when page is ready
// and init jobsityManager
// options 
$(function()
{
	jobsityManager.init(
	{
		tweetHideSelector: '.hide-tweet'
	});
});