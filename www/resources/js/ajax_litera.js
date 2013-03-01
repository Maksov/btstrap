      $.ajax({
            url: "/ajax/ajax_litera/",
            dataType: "json",
            success:   function (data,textStatus) {
                    $("#content").html('');
                    $("#content").append('<table class="table table-hover">' +
                        '<thead> ' +
                            '<tr> ' +
                                '<th>№</th> ' +
                                '<th>title</th> ' +
                                '<th>short_title</th> ' +
                            '</tr>'+
                        '</thead>'+
                        '<tbody id="data-table">' +
                        '</tbody>' +
                        '</table>');

                    $.each(data, function (i, val) {
                    $("#data-table").append('<tr> <td>'+val.id+'</td> <td>'+val.title+'</td> <td>'+val.short_title+'</td> </tr>');
                });
            }
        }); 
   
