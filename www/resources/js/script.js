     $.ajax({
            url: "/ajax/ajax_litera/",
            dataType: "json",
            success:   function (data,textStatus) {
                $.each(data, function (i, val) {
                    $("#content").html('');
					$.each(data, function (i, val) {
                    $("#content").append('<p>'+val.short_title+'</p>');
                });
                });
            }
        });