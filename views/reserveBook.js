var allButtons = document.querySelectorAll('.reserve-btn');
for (var i = 0; i < allButtons.length; i++) {
  allButtons[i].addEventListener('click', function(e) {
    e.preventDefault();
    const btnValue = $(this).val();
    $.ajax({
        //AJAX type is "Post".
        type: "POST",
        //Data will be sent to "ajax.php".
        url: "../modal/reserveBook.php",
        //Data, that will be sent to "ajax.php".
        data: {
            //Assigning value of "name" into "search" variable.
            reservebook: btnValue
        },
        //If result found, this funtion will be called.
        success: function(data) {
            alert(data);
            },
            //Assigning result to "display" div in "search.php" file.
        error: function ( xhr ) {
            alert("error");
        }    
        });   
  });
}
