
// Issue book 

var allButtons = document.querySelectorAll('.btn-issueBook');
for (var i = 0; i < allButtons.length; i++) {
  allButtons[i].addEventListener('click', function(e) {
    e.preventDefault();
    const btnValue = $(this).val();
    $.ajax({
        //AJAX type is "Post".
        type: "POST",
        //Data will be sent to "ajax.php".
        url: "../modal/issueBook.php",
        //Data, that will be sent to "ajax.php".
        data: {
            //Assigning value of "name" into "search" variable.
            issuebook: btnValue
        },
        //If result found, this funtion will be called.
        success: function(data) {
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

// return book

var allButtons = document.querySelectorAll('.btn-returnBook');
for (var i = 0; i < allButtons.length; i++) {
  allButtons[i].addEventListener('click', function(e) {
    e.preventDefault();
    const btnValue = $(this).val();
    $.ajax({
        //AJAX type is "Post".
        type: "POST",
        //Data will be sent to "ajax.php".
        url: "../modal/returnBook.php",
        //Data, that will be sent to "ajax.php".
        data: {
            //Assigning value of "name" into "search" variable.
            returnbook: btnValue
        },
        //If result found, this funtion will be called.
        success: function(data) {
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

// Add book to online catalogue

$('#add-book').on('click','.add-book',function(){
    let bookId = $('#add-book input[name="bookId"]').val();
    let bookname = $('#add-book input[name="bookname"]').val();
    let authorname = $('#add-book input[name="authorname"]').val();
    let tcount = $('#add-book input[name="tcount"]').val();
    if (bookId == '' || bookname == '' || authorname == '' || tcount == '' || tcount == null ){
        alert('Invalid/Empty fields');
        return;
    } else {
        if ((tcount - Math.floor(tcount)) !== 0) {

            alert('Invalid count...')
            return;
            
        } else if (!isNaN(tcount) && tcount>0) {

                $.ajax({
                //AJAX type is "Post".
                type: "POST",
                //Data will be sent to "ajax.php".
                url: "../modal/addBook.php",
                //Data, that will be sent to "ajax.php".
                data: {
                    //Assigning value of "name" into "search" variable.
                    bookId: bookId,
                    bookname: bookname,
                    authorname: authorname,
                    tcount: tcount
                },
                //If result found, this funtion will be called.
                success: function(data) {
                    alert(data);
                    let inputFields = document.querySelectorAll('#add-book input[type="text"]');
                    let inputTypeNumber = document.querySelector('#add-book input[name="tcount"]');
                    inputTypeNumber.value = "";
                    inputFields.forEach(element => {
                        element.value = "";
                    });
                    },
                    //Assigning result to "display" div in "search.php" file.
                error: function ( xhr ) {
                    alert("error");
                }    
            });
        }
        else{

            alert('Invalid count...')
            return;
        }    
    }  
}); 

// Issue book offline
$('#issue-book-offline').on('click', '.issue-book-offline' , () =>{
    let userId = $('#issue-book-offline input[name="userId"]').val();
    let bookId = $('#issue-book-offline input[name="bookId"]').val();
    if (userId == '' || bookId == '') {
        alert('Both the fields are required');
    } else {
        $.ajax({
            type: 'POST',
            url: "../modal/issueBookOffline.php",

            data: {
               bookId: bookId,
               userId: userId 
            },
            success: (data) =>{
                alert(data);
                let userinput = document.querySelector('#issue-book-offline input[name="userId"]');
                let bookIdinput = document.querySelector('#issue-book-offline input[name="bookId"]');
                userinput.value = '';
                bookIdinput.value = '';
            },
            error: (xhr) =>{
                alert('Some error occured')
            }
            
        });
    };
});