var allButtons = document.querySelectorAll('.unreserve-btn');
for (var i = 0; i < allButtons.length; i++) {
  allButtons[i].addEventListener('click', function(e) {
    e.preventDefault();
    const btnValue = $(this).val();
    $.ajax({
        //AJAX type is "Post".
        type: "POST",
        //Data will be sent to "ajax.php".
        url: "../modal/unreserve.php",
        //Data, that will be sent to "ajax.php".
        data: {
            //Assigning value of "name" into "search" variable.
            unreservebook: btnValue
        },
        //If result found, this funtion will be called.
        success:    function(data) {
            alert(data);
            window.location.reload();
        },
            //Assigning result to "display" div in "search.php" file.
        error: function ( xhr ) {
            alert("error");
        }    
        });   
  });
}
