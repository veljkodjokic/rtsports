<!DOCTYPE html>
<html>



                    <video id="video" width=960 height=540 controls>
                        <source src="http://91.121.72.155/hls/stream.m3u8" type="application/x-mpegURL">
                    </video>
                
<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>

<script type="text/javascript">
    if(Hls.isSupported()) {
        var video = document.getElementById('video');
        var hls = new Hls();
        hls.loadSource('http://91.121.72.155/hls/stream.m3u8');
        hls.attachMedia(video);
        hls.on(Hls.Events.MANIFEST_PARSED,function() {
            video.play();
        });
    }
</script>
</body>
</html>
