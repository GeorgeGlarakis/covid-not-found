function insert(input) {
    var file_to_read = input.files[0];
    var fileread = new FileReader();
    fileread.onload = function(e) {
        var content = e.target.result;
        var intern = JSON.parse(content); // parse json 
        console.log(intern[2]); // You can index every object
    };
    fileread.readAsText(file_to_read);
}