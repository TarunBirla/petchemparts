

<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Result</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM8z4+2e5c7e5a5b5e5a5b5e5a5b5e5a5b5e5" crossorigin="anonymous" />
    <script src="https://w.soundcloud.com/player/api.js"></script>

    </head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
<!-- <iframe style="border-radius: 12px" width="100%" height="152" title="Spotify Embed: My Path to Spotify: Women in Engineering " frameborder="0" allowfullscreen allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy" src="https://open.spotify.com/embed/episode/7makk4oTQel546B0PZlDM5?utm_source=oembed"></iframe> -->
<!-- <iframe style="border-radius:12px" src="https://open.spotify.com/track/2Fv2injs4qAm8mJBGaxVKU" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe> -->
    <!-- <iframe width="100%" height="80"
    src="https://www.youtube.com/embed/dQw4w9WgXcQ?start=30"
    title="YouTube audio"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen>
</iframe> -->

<!-- 
<iframe width="100%" height="80" scrolling="no" frameborder="no" allow="autoplay"
    src="https://w.soundcloud.com/player/?url=https://soundcloud.com/farazhbk/kaise-kasie-log?si=8b44a63291bf4605b6ae6549d7af5995&utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing">
</iframe> -->



<div style="position: relative; width: 100%; height: 100vh; overflow: hidden;">
    <!-- Cover Image (placed on top) -->
    <img src="{{ asset('images/banner.png') }}" id="coverImage"
         alt="Play Song"
         style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; cursor: pointer; z-index: 2;">
    <iframe
        id="sc-player"
        width="100%"
        height="80"
        scrolling="no"
        frameborder="no"
        allow="autoplay"
        src="https://w.soundcloud.com/player/?url=https%3A//soundcloud.com/farazhbk/kaise-kasie-log&color=%23ff5500&auto_play=false&show_user=false&show_comments=false&show_reposts=false&show_teaser=false&visual=false"
        style="z-index: 1; position: relative;">
    </iframe>
</div>


<div style="margin-top: 10px;">
  <button id="playBtn" style="padding: 8px 16px; margin-right: 5px; color: black; border: none;">
    <img id="playIcon" src="{{ asset('images/Prplay.png') }}" alt="" style="width: 20px; vertical-align: middle;"> Play
  </button>

  <button id="pauseBtn" style="padding: 8px 16px; margin-right: 5px; color: black; border: none;">
    <img id="pauseIcon" src="{{ asset('images/play.png') }}" alt="" style="width: 20px; vertical-align: middle;"> Pause
  </button>
</div>

    <!-- <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/5zCnGtCl5Ac5zlFHXaZmhy?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe> -->
    </div>
</body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const iframeElement = document.getElementById('sc-player');
        const widget = SC.Widget(iframeElement);

        document.getElementById('playBtn').addEventListener('click', function () {
            widget.play();
        });

        document.getElementById('pauseBtn').addEventListener('click', function () {
            widget.pause();
        });

        document.getElementById('stopBtn').addEventListener('click', function () {
            widget.seekTo(0); 
            widget.pause();   
        });
        playBtn.addEventListener('click', function () {
            widget.play();
            pauseIcon.src = "{{ asset('images/Vector.png') }}"; 
        });

        pauseBtn.addEventListener('click', function () {
            widget.pause();
            pauseIcon.src = "{{ asset('images/Prplay.png') }}"; 
        });
    });
</script>


