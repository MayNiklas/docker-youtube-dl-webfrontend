#!/usr/local/bin/php
<?php
	$link = $argv[1];
	exec("youtube-dl -f 'bestvideo[ext=mp4]+bestaudio[ext=m4a]/bestvideo+bestaudio' --merge-output-format mp4 '$link' -o '%(title)s-%(uploader)s-%(width)sx%(height)s.%(ext)s' --restrict-filenames");
	$video=exec("ls -a1 *.mp4 | tail -n 1");

	exec("mkdir -p dl");
	exec("mv $video /var/www/html/dl/");

	exec("touch videos.txt");
	exec("echo \"<a href='/dl/$video'>/dl/$video</a> <a>(deletes on " . date("Y-m-d H:i:s", time() + 24 * 60 * 60) . ")</a><p></p>\" >> /var/www/html/videos.txt");
?>

