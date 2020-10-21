$(function(){
    const selected = $("select[name=change_sort]");
    selected.on('change', function(){
        window.location.href = selected.val();
    });
});