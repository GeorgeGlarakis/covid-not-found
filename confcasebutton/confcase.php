<!-- <?php
    include_once 'header.php';
    ?> -->

        <section class="confcase-date">
            <h2>Confirm a case</h2>
            <div class="confcase-date-date">
                <input type="date" id="confcase-date">
                <button id="confcase-submit">Confirm case</button>

        <script defer type="text/javascript">
                    
            $(document).ready(function () {
    
                $('#confcase-submit').click(function () {
                    var date = document.getElementById("confcase-date").value;
                    
                    console.log (date)
    
                    $.ajax( {
                        url: "confcase.inc.php",
                        dataType: "text",
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
            });
        </script>
        
    <!-- <?php
        include_once 'footer.php'
    ?> -->