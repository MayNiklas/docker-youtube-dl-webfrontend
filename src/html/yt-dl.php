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
        <p>
          <a href='/'>Back home</a>
          <form action="yt-dl.php" method="get">
            <p>
              YouTube link<input type="text" name="link" />
              <button type="submit">Send</button>
            </p>
          </form>           
        </p>
        <?php
        $link = $_GET["link"];
      	$cmd = "youtube-dl -f 'bestvideo[ext=mp4]+bestaudio[ext=m4a]/bestvideo+bestaudio' --merge-output-format mp4 '$link' -o '%(title)s-%(uploader)s-%(width)sx%(height)s.%(ext)s' --restrict-filenames --no-playlist";
      	exec("$cmd");
    
        $cmd="ls | grep *.mp4";
        $video=exec("$cmd");

        exec("mkdir dl");
        $cmd = "mv $video /var/www/html/dl/";
        exec("$cmd");

        $cmd = "touch videos.txt";
        exec("$cmd");
        $cmd = "echo \"<a href='/dl/$video'>/dl/$video</a> <p></p>\" >> /var/www/html/videos.txt";
        exec("$cmd");

      	echo file_get_contents( "videos.txt" );
      	?>
      </main>
      <footer>
        <p>For personal use only!</p>
      </footer>
      </body>
  </html>

