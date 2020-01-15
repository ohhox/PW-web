$(".removeNews").on("click", function (e) {
    e.preventDefault();
    if (confirm("ยืนยันการลบข้อมูล เมื่อลบแล้วไม่สามารถกู้คืนได้อีก")) {

        var obj = $(this);
        var url = $(this).attr("href");
        $.ajax(url).done(function (data) {
            if (data == "ok") {
                obj.parent().parent().remove();
            }
        });
    } else {

    }
});

$(".removeHotel").on("click", function (e) {

    if (confirm("ยืนยันการลบข้อมูล เมื่อลบแล้วไม่สามารถกู้คืนได้อีก")) {

    } else {
        e.preventDefault();
    }
});

$(".removeHotelGl").on("click", function (e) {
    e.preventDefault();
    if (confirm("ยืนยันการลบข้อมูล เมื่อลบแล้วไม่สามารถกู้คืนได้อีก")) {
        var obj = $(this);
        var url = $(this).attr("href");
        $.ajax(url).done(function (data) {
            if (data == "ok") {
                obj.parent().remove();
            }
        });
    }  
});

$('.ListComplaint').on('click', function () {
    var id = $(this).attr('data-id');
    $(this).find('.dotStatus').remove();
    $.ajax('complaints_detail.php?id=' + id).done(function (data) {
        var res = $.parseJSON(data);
        $("#Complaintsname").html(res.name_lastname);
        $("#ComplaintsEmail").html(res.email);
        $("#Complaintstime").html(res.datetime);
        $("#ComplaintsSub").html(res.subject);
        $("#ComplaintsMsg").html(res.message);
    });

});