<!DOCTYPE html>
  <html>
    <head>
      <link rel="stylesheet" href="style.css">
      <title>youtube-dl webfrontend</title>
    </head>
    <body>
      <header>
        <h1>youtube-dl webfrontend</h1>
      </header>
      <main>
        <form method="post">
          <p>
            YouTube link<input type="text" name="link" />
            <button type="submit">Send</button>
          </p>
        </form>
        <?php
	if(isset($_POST['link'])){
		preg_match("/http(?:s?):\/\/(?:www\.)?youtu(?:be\.com\/watch\?v=|\.be\/)([\w\-\_]{10,10})(&(amp;)?‌​[\w\?‌​=]{10,10})?/", $_POST['link'], $matches);
	        exec("./dl.php " . $matches[0] . " > /dev/null &");
	}
	exec("touch videos.txt");
	echo file_get_contents( "videos.txt" );
	$new_videos_txt = "";
	foreach(file("videos.txt") as $line){
		preg_match("/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/", $line, $matches);
		if(time() > strtotime($matches[0])){
			preg_match("/'(.*)'/", $line, $matches);
			exec("rm dl/" . $matches[1]);
		} else {
			$new_videos_txt = $new_videos_txt . $line . '\n';
		}
	}
	file_put_contents("videos.txt", $new_videos_txt);
        ?>
      </main>
      <footer>
        <p>For personal use only!</p>
      </footer>
      </body>
  </html>

