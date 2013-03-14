      $.ajax({
          type: "post",
          url: "/ajax/ajax_litera/",
            dataType: "json",
            success:   function (data,textStatus) {
                    $("#phones").html('');
                    $("#phones").append('<table class="table table-hover">' +
                        '<thead> ' +
                            '<tr> ' +
                                '<th>ФИО</th> ' +
                                '<th>Должность</th> ' +
                                '<th>Отдел</th> ' +
                                '<th>Тел. номер</th> ' +
                                '<th>№ ВТС</th> ' +
                            '</tr>'+
                        '</thead>'+
                        '<tbody id="data-table">' +
                        '</tbody>' +
                        '</table>');
                    $.each(data, function (i, val) {
                    $("#data-table").append('<tr> <td>'+val.short_fio+'</td> <td>'+val.dolznost+'</td> <td>'+val.otdel+'</td> <td>' +val.phone_number+'</td> <td>'+val.phone_vts+'</td></tr>');
                });
            }
        }); 
   
