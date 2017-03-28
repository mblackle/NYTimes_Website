<?php

/* Owner: Michael Blackley
 * Date: 11/21/16
 * Purpose: The purpose of this program is to use XML to make a news website based off of the posts on
 * NY Times. This program shows the user a picture from an article along with the discription, date published and a link
 * to lead you to the NY times website to see the full article.
 */

$xml = simplexml_load_file("http://rss.nytimes.com/services/xml/rss/nyt/World.xml") or die ("Cant load XML!");
$channel = $xml->channel;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <title>My News Site</title>
    </head>
    <!--[if IE 6 ]><body class="ie6 old_ie"><![endif]-->
    <!--[if IE 7 ]><body class="ie7 old_ie"><![endif]-->
    <!--[if IE 8 ]><body class="ie8"><![endif]-->
    <!--[if IE 9 ]><body class="ie9"><![endif]-->
    <!--[if !IE]><!--><body><!--<![endif]-->
		<header>
			<h1><a href="index.php">Box Press</a><span id="version">v1</span></h1>
			<nav>
				<ul>
					<li><a href="index.php" class="current">Home</a></li>
					<li><a href="#">My Favourite</a></li>
				</ul>
			</nav>
		</header>
		<br/><br/><br/><br/><br/>
		<div id="secwrapper">
			<section>
				<?php
				foreach ($channel->item as $item) {
					echo "<article>";

					//$media = $item->content;
					//$image = $media->children("http://search.yahoo.com/mrss/", FALSE);

					if($item->children('media', TRUE)) {
						echo '<a href="#"><img src = "' . $item->children('media', TRUE)->content->attributes()->url. '" alt=""/></a> ';
					} else {
						echo '<a href="#"><img src="https://static01.nyt.com/images/misc/NYT_logo_rss_250x40.png" alt=""/></a>';
					}

					echo '<h1>' . $item->title . '</h1>';
					echo '<p>' . $item->description . '</p>';
					echo '<p><a href="' . $item->link . '" class= "readmore">Read More </a>';
					echo '<p style ="color:green;">' . $item->pubDate . '</p>';

					echo '</article>';
				}
				?>
					<article>
						<a href="#"><img src="https://static01.nyt.com/images/misc/NYT_logo_rss_250x40.png" alt=""/></a>
						<h1>Title</h1>
						<p>Description</p>
						<a href="#" class="readmore">Read more</a>
						<p style="color:blue;">1/1/2001</p>
					</article>
			</section>
		</div>
		<footer>
			<p>Copyright &copy 2012 BoxPress by Youssef Nassim. All Rights Reserved.</p>
		</footer>
	</body>
</html>
		
		
			
    
    