<!-- <?php
    include_once 'header.php';
    ?> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"        
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous"></script>
	<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
		

        <section class="visits">
            <h2>Confirm a visit</h2>
            <div class="visits-bolean">
                <input type="boolean" id="visits">
                <button id="visits-submit">Confirm case</button>
            </div>
        </section>
        <br>
        <p id="test"> </p>
            

        <script defer type="text/javascript">
                    
            $(document).ready(function () {
    
                $('#visits-submit').click(function () {
                    var boolean = document.getElementById("visits").value;
                    var user_id = 1;
                    
                    console.log (date)
    
                    $.ajax( {
                        url: "visits.inc.php",
                        dataType: "text",
                        type: "POST",
                        data: {
                            confcase: JSON.stringify({ 
                                boolean: boolean,
                                user_id: user_id
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