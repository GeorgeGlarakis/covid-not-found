<<<<<<< HEAD
<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title></title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.32.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.32.1/mapbox-gl.css' rel='stylesheet' />
    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; }
    </style>
</head>
<body>

<div id='map'></div>
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZGF2aWRndWFuIiwiYSI6ImNpcG50N2s4NDAwNGRmbG5jeXZtMHkxMW4ifQ.ubiXybBxhpidF83H-Zvz7Q';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v9',
        center: [0, 0],
        zoom: 2
    });
</script>
</body>
</html>
=======
<?php>
    include_once 'header.php';
<?>
=======
>>>>>>> 894c95e38949026267b770684727a0ac501eb2a2

    <section class="index-intro">
        <h1>Welcome to Admin's Main Page</h1>
    </section>

<<<<<<< HEAD
<<<<<<< HEAD
    <section class="index-categories">
    
>>>>>>> 126ccdc (admin dashboard is ready)
=======
=======
>>>>>>> 894c95e38949026267b770684727a0ac501eb2a2
    <?php
        if(isset($_POST['btn-u'])){
            echo 'You just clicked Upload button';
        }
        if(isset($_POST['btn-e'])){
            echo 'You just clicked Edit button';
        }
        if(isset($_POST['btn-dd'])){
            echo 'You just clicked Delete Data button';
        }
    ?>
    <form method="post"> 
        <input type="submit" name="btn-u" value ="Upload"> 
        <input type="submit" name="btn-e" value ="Edit"> 
        <input type="submit" name="btn-dd" value ="Delete Data"> 
    </form>
<<<<<<< HEAD
      
>>>>>>> eff02e3 (insert/edit/delete buttons)
=======
      
>>>>>>> 894c95e38949026267b770684727a0ac501eb2a2
