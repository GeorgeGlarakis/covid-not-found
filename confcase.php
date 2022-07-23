<!-- <?php
    include_once 'header.php';
    ?> -->
            
        <script defer type="text/javascript">
                    
            $(document).ready(function () {
    
                $('confcase-submit').click(function () {
                    var date = document.getElementById("confcase-date").value;
    
                    $.ajax( {
                        url: "includes/login.inc.php",
                        dataType: "date",
                        type: "POST",
                        data: {
                            confcase: JSON.stringify({ 
                                date: date,
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
        </script>
        
    <!-- <?php
        include_once 'footer.php'
    ?> -->