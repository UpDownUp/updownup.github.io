<?php
/**
 * @package Hello_Dolly
 * @version 1.6
 */
/*
Plugin Name: Hello Dolly
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.6
Author URI: http://ma.tt/
*/

function hello_dolly_get_lyric() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = "Uh-oh, running out of breath, but I
Oh, I, I got stamina
Uh-oh, running now, I close my eyes
Well, oh, I got stamina
And uh-oh, I see another mountain to climb
But I, I, I got stamina
Uh-oh, I need another lover, be mine
Cause I, I, I got stamina

Don't give up, I won't give up
Don't give up, no no no
Don't give up, I won't give up
Don't give up, no no no

I'm free to be the greatest, I'm alive
I'm free to be the greatest here tonight, the greatest
The greatest, the greatest alive
The greatest, the greatest alive

Well, uh-oh, running out of breath, but I
Oh, I, I got stamina
Uh-oh, running now, I close my eyes
But, oh, I got stamina
And oh yeah, running through the waves of love
But I, I got stamina
And oh yeah, I'm running and I've just enough
And uh-oh, I got stamina

Don't give up, I won't give up
Don't give up, no no no
Don't give up, I won't give up
Don't give up, no no no

I'm free to be the greatest, I'm alive
I'm free to be the greatest here tonight, the greatest
The greatest, the greatest alive
The greatest, the greatest alive

Oh-oh, I got stamina
Oh-oh, I got stamina
Oh-oh, I got stamina
Oh-oh, I got stamina

Hey, I am the truth
Hey, I am the wisdom of the fallen - I'm the youth
Hey, I am the greatest
Hey, this is the proof
Hey, I work hard, pray hard, pay dues, hey
I transform with pressure, I'm hands-on with effort
I fell twice before my bounce back was special
Letdowns will get you, and the critics will test you
But the strong will survive, another scar may bless you, ah

Don't give up (no no), I won't give up (no no)
Don't give up, no no no (nah)
Don't give up, I won't give up
Don't give up, no no no

I'm free to be the greatest, I'm alive
I'm free to be the greatest here tonight, the greatest
The greatest, the greatest alive (don't give up, don't give up, don't give up, no no no)
The greatest, the greatest alive (don't give up, don't give up, don't give up, no no no)

The greatest, the greatest alive (don't give up, don't give up, don't give up, no no no)
The greatest, the greatest alive (don't give up, don't give up, don't give up, no no no)
The greatest, the greatest alive (don't give up, don't give up, don't give up, no no no)
The greatest, the greatest alive (I got stamina)
The greatest, the greatest alive (I got stamina)
The greatest, the greatest alive (I got stamina)";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_dolly() {
	$chosen = hello_dolly_get_lyric();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_dolly' );

// We need some CSS to position the paragraph
function dolly_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );

?>

