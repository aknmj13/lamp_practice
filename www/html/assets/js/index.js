$(function(){
    $('select').change(function(){
        let val = $(this).val();
        console.log(val);
        // $.ajax({
            // type: "GET",
            // url: "index.php",
            // data: {'change_sort': val},
            // dataType: "json",
            // scriptCharset: 'utf-8'
        // })
        
    })
})