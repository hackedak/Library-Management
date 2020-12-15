
function reserveBook(id){
    var book = id;
$.ajax
  ({
  type:'POST',
  url:'reserveBook.php',
  data:{
    reserve_book : book
  },
  success:function(response) {
  if(response=="success")
  {
    alert("Success");

  }
  else
  {
    alert('failed'+book);
    window.location.href="resulPage.php";
  }
  }
  });
  return false;
}