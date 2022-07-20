<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Covid</title> 
        <!-- <link rel="stylesheet" href="css/style.css"> -->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"        
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous"></script>
		<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
		
    </head>

    <body>
        <!-- Upload File -->
        <div>
            Upload a JSON file with POI info: <input type="file" id="jsonfileinput" name="jsonfileinput" />

            <button id="save">Save</button>

            <script defer type="text/javascript">
                
                $(document).ready(function () {

                    $('#save').click(function () {
                        var file_to_read = document.getElementById("jsonfileinput").files[0];
                        var fileread = new FileReader();
                        var myJSON;

                        fileread.readAsText(file_to_read);
                        fileread.onload = function() {
                            myJSON = JSON.parse(fileread.result);
                            console.log(myJSON);                        
                        }

                        fileread.onloadend = function() {
                            var sendfile = JSON.stringify(myJSON);

                            $.ajax( {
                                url: "insert_pois.inc.php",
                                dataType: "text",
                                type: "POST",
                                data: {
                                    pois: sendfile 
                                }, 
                                success: function( response ) {
                                    console.log(response)
                                },
                                error: function( error ) {
                                    console.log(error)
                                }
                            });
                        }
                        fileread.onerror = function() {
                            console.log(fileread.error);
                        }

                    });

                })              

            </script>
        </div>

    </body>
</html>

