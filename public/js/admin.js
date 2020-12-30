
// Issue book 

var allButtons = document.querySelectorAll('.btn-issueBook');
for (var i = 0; i < allButtons.length; i++) {
    allButtons[i].addEventListener('click', function(e) {
    e.preventDefault();
    const btnValue = $(this).val();
    $.ajax({
        type: "POST",
        url: "../modal/issueBook.php",
        data: {
            issuebook: btnValue
        },
        //If result found, this funtion will be called.
        success: function(data) {
            alert(data);
            window.location.reload();
            },
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
        
        type: "POST",
        
        url: "../modal/returnBook.php",
        
        data: {
           
            returnbook: btnValue
        },
        
        success: function(data) {
            alert(data);
            window.location.reload();
            },
           
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
                
                type: "POST",
                
                url: "../modal/addBook.php",
               
                data: {
                   
                    bookId: bookId,
                    bookname: bookname,
                    authorname: authorname,
                    tcount: tcount
                },
                
                success: function(data) {
                    alert(data);
                    let inputFields = document.querySelectorAll('#add-book input[type="text"]');
                    let inputTypeNumber = document.querySelector('#add-book input[name="tcount"]');
                    inputTypeNumber.value = "";
                    inputFields.forEach(element => {
                        element.value = "";
                    });
                    },
                   
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