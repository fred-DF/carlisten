<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Videoplayer - Adventskalender</title>
</head>
<body>
<style>
    video {
        height: 100%;
        width: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
    }

    #modal-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        -webkit-backdrop-filter: blur(10px) brightness(0.8);
        backdrop-filter: blur(10px) brightness(0.8);
        z-index: 999;
    }

    #modal {
        position: absolute;
        color: white;
        font-family: sans-serif;
        padding: 0 50px;
    }

    #photo {
        position: absolute;
        top: 0;
        left: 0;
        display: none;
        height: 100%;
        width: 100%;
        object-fit: cover;
        border-radius: 3px;
        z-index: 999;
    }


    button {
        border: none;
        background-color: #673ab7;
        color: white;
        padding: 15px 30px;
        border-radius: 3px;
    }
</style>
<?php

if(!isset($_COOKIE['hub_check'])) {
    setcookie("hub_check", "1", time()+3600)
    ?>
        <div id="modal-wrapper">
            <div id="modal">
                <h2>Videoende enthüllt Adventskalender-Foto</h2>
                <p>Heike & Birgit, nach unserem Video könnt ihr jetzt das Foto sehen, wie wir Euren Adventskalender öffnen. Schaut dazu einfach das Video bis zum Ende und dann seht ihr das Foto.</p>
                <button onclick="window.location.reload();">Video anschauen und Foto entdecken</button>
            </div>
        </div>
    <?php
}

if(isset($_COOKIE['hub']) && file_exists(__DIR__.'/src/photos/'.date('d').'.jpg')) {
    ?>
    <img src="src/photos/<?php echo date('d') ?>.jpg" alt="" id="photo">
    <?php
}
?>
<video id='video' src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" controls autoplay></video>
<script>
    document.getElementById('video').addEventListener('ended',() => {
        document.getElementById('photo').style.display = 'block';
    },false)
</script>
</body>
</html>