
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"        
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous"></script>
	<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
		

        <section class="visits-int">
            <h2>Confirm a visit</h2>
            <div class="visits-int-int">
                <input type="number" id="visits-estimation" name="estimation">
                <button id="visits-submit">Confirm visit</button>
            </div>
        </section>
        <br>
        <p id="test"> </p>
            

        <script defer type="text/javascript">
                    
            $(document).ready(function () {
    
                $('#visits-submit').click(function () {
                    var estimation = document.getElementById("visits-estimation").value;
                    var user_id ='<?php echo $_SESSION["user_id"];?>';
                    var poi_id = "ChIJ4e-5v05JXhMRDZp4UgNSSqg";
                    //visit_time apo db
                    
    
                    $.ajax( {
                        url: "visits.inc.php",
                        dataType: "text",
                        type: "POST",
                        data: {
                            visits: JSON.stringify({ 
                                user_id: user_id,
                                poi_id: poi_id,
                                estimation: estimation
                            })
                        }, 
                        success: function( response ) {
                            // window.location = "../index.php"
                            $('#test').html(response)
                        },
                        error: function( error ) {
                            console.log(error)
                        }
                    });
                });
            });
        </script>
        
    <!-- <?php
        include_once 'footer.php'
    ?> -->