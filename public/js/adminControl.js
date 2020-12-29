
$(document).ready(function () {
    $('.sidebar .control-panel li:first').addClass('active');
    $('.tab-content:not(:first)').hide();
    $('.sidebar .control-panel li a').click(function (event) {
        event.preventDefault();
        var content = $(this).attr('href');
        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');
        $(content).show();
        $(content).siblings('.tab-content').hide();
    });
});

const returnBtn =  document.querySelector('btn-icon');
returnBtn.addEventListener('click', ()=>{
    window.location.href = '../views/admin.php';
})
