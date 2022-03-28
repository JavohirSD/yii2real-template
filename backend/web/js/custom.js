$( document ).ready(function() {
    var controller_id = window.location.pathname.split("/")[2];
    var action_id     = window.location.pathname.split("/")[3];

    if(action_id === "view") {
        $("a.btn-success").hover(function () {
            $(this).animate({width: "150px"}, 200, function () {
                $(this).append(" Yangi yaratish");
            });
        }, function () {
            $(this).stop();
            $(this).html($(this).html().replace(/Yangi yaratish/g, ''));
            $(this).animate({width: "60px"}, 200);
        });

        $("a.btn-primary").hover(function () {
            $(this).animate({width: "150px"}, 200, function () {
                $(this).append(" Tahrirlash");
            });
        }, function () {
            $(this).stop();
            $(this).html($(this).html().replace(/Tahrirlash/g, ''));
            $(this).animate({width: "60px"}, 200);
        });

        $("a.btn-danger").hover(function () {
            $(this).animate({width: "150px"}, 200, function () {
                $(this).append(" O`chirish");
            });
        }, function () {
            $(this).stop();
            $(this).html($(this).html().replace(/O`chirish/g, ''));
            $(this).animate({width: "60px"}, 200);
        });

        $("a.btn-info").hover(function () {
            $(this).animate({width: "170px"}, 200, function () {
                $(this).append(" Menyuga qaytish");
            });
        }, function () {
            $(this).stop();
            $(this).html($(this).html().replace(/Menyuga qaytish/g, ''));
            $(this).animate({width: "60px"}, 200);
        });
    }

    if(action_id === "create") {
        var date_input = $('#' + controller_id + '-created_date');
        if (date_input.val() === '') {
            var moment = new Date();
            var dd     = String(moment.getDate()).padStart(2, '0');
            var mm     = String(moment.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy   = moment.getFullYear();
            var hh     = String(moment.getHours()).padStart(2, '0');
            var ii     = String(moment.getMinutes()).padStart(2, '0');
            moment     = dd + '-' + mm + '-' + yyyy + ' ' + hh + ':' + ii;
            date_input.val(moment);
        }
        date_input.inputmask("datetime", {
            mask: "1-2-y h:s",
            placeholder: "dd-mm-yyyy hh:mm",
            leapday: "-02-29",
            separator: "-",
            alias: "dd/mm/yyyy"
        });
    }


    if (action_id === "index") {
        $('#delete_selected').click(function () {
            var keys = $('.grid-view').yiiGridView('getSelectedRows');
            if (keys.length < 1) {
                alert('O’chirish uchun maydon tanlanmadi !');
                return false
            }
            if (confirm('Belgilangan ma’lumotlarni o’chirmoqchimisiz ?')) {
                $.ajax({
                    type: "POST",
                    url: "/control/" + controller_id + "/remover",
                    data: {ids: keys},
                    success: function (response) {
                        location.reload();
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
            }
        });
    }
});

