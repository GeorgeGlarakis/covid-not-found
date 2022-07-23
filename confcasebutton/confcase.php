<!-- <?php
    include_once 'header.php';
    ?> -->
    	

        <section class="confcase-date">
            <h2>Confirm a case</h2>
            <div class="confcase-date-date">
                <input type="date" id="confcase-date">
                <button id="confcase-submit">Confirm case</button>
            </div>
        </section>
        <br>
        <p id="test"> </p>
            
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"        
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
	<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
	
    <script defer type="text/javascript">
                
        $(document).ready(function () {
            $('#confcase-submit').click(function () {
                var date = document.getElementById("confcase-date").value;
                var user_id = 1;

                $.ajax( {
                    url: "confcase.inc.php",
                    dataType: "text",
                    type: "POST",
                    data: {
                        confcase: JSON.stringify({ 
                            date: date,
                            user_id: user_id
                        })
                    }, 
                    success: function( response ) { $('#test').html(response) },
                    error: function( error ) { console.log(error) }
                });
            });
        });
    </script>
        
<!-- <?php
    include_once 'footer.php'
?> -->