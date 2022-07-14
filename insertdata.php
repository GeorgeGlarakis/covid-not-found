<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Covid</title> 
        <!-- <link rel="stylesheet" href="css/style.css"> -->
        <script type="text/javascript" src="/javascript/insertscripts.js"></script>
    </head>

    <body>
        <!-- Upload File -->
        <div>
            <input type="file"  id="jsonfileinput" />


            <script defer type="text/javascript">
                document.getElementById("jsonfileinput").addEventListener("change", insert(this));
            </script>
            <!-- <script defer type="text/javascript">
                document.getElementById("jsonfileinput").addEventListener("change", function() {
                    var file_to_read = document.getElementById("jsonfileinput").files[0];
                    var fileread = new FileReader();
                    fileread.onload = function(e) {
                        var content = e.target.result;
                        var intern = JSON.parse(content); // parse json 
                        console.log(intern[2]); // You can index every object
                    };
                    fileread.readAsText(file_to_read);
                });
            </script> -->
        </div>

    </body>
</html>