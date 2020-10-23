$(function(){
    $('select').change(function(){
        let val = $(this).val();
        location.href='index.php?change_sort='+val;
        
    })
})