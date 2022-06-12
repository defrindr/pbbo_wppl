$(function(){
    $(document).ready(function(){
        //Convert to iCheck checkboxes
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        $("img").error(function(){
            $(this).attr("src", baseUrl + "/uploads/default.png");
        });
    });
});

$(".dynamicform_wrapper").on("beforeInsert", function (e, item) {
    console.log("beforeInsert");
});

$(".dynamicform_wrapper").on("afterInsert", function (e, item) {
    console.log("afterInsert");
});

$(".dynamicform_wrapper").on("beforeDelete", function (e, item) {
    if (!confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper").on("afterDelete", function (e) {
    console.log("Deleted item!");
});

$(".dynamicform_wrapper").on("limitReached", function (e, item) {
    alert("Limit reached");
});