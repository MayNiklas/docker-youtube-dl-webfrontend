# docker-youtube-dl-webfrontend

### Usecase:
I often need a downloaded YouTube video on my phone. Since I don't want to transfer the files to my phone manually all the time, I decided to code a small web interface for youtube-dl

### Diclaimer:
I want to be honest:
- this application is written in PHP -> it's a security risk per default
- there is a way better way to code it for sure!
- it doesn't support multiple downloads at the same time

I'm still sharing the code here on GitHub, since maybe someone would profit by it & I haven't found something working online.
Running the application @localhost through docker still should be fine. It serves it's purpose very well.

In case you think there is an easy way to improve: feel free to write an "Issue / feature improvement" or make an pull request yourself.


docker-compose example file:
```
---
version: "3.0"
services:
  youtube-dl:
    image: mayniki/youtube-dl-webfrontend
    ports:
      - "80:80"
```
