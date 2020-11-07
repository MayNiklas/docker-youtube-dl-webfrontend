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
        <form action="yt-dl.php" method="get">
          <p>
            YouTube link<input type="text" name="link" />
            <button type="submit">Send</button>
          </p>
        </form>
        <?php
        echo file_get_contents( "videos.txt" );
        ?>
      </main>
      <footer>
        <p>For personal use only!</p>
      </footer>
      </body>
  </html>

