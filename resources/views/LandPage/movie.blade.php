@if ($video != null)
    <div class="video-area" id="video">
        <div class="container">
            <div class="row">
                <div class="video_box">
                    <a class="box_video fancybox.iframe" href="https://www.youtube.com/embed/{{ $video->link }}?autoplay=1">
                        <img id="image" src="http://img.youtube.com/vi/{{ $video->link }}/0.jpg" alt="">
                    </a>
                    <div id="play"></div>
                </div>
            </div>
        </div>
    </div>
@endif