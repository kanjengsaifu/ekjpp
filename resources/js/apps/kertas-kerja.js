
$(function(){
    (function(){
        var $input = $('');
        var table = '.table-movefield';
        var $table = $(table);
        var isSubTable = false;
        var x = 0;
        var y = 0;
        var xs = 0;
        var ys = 0;

        jQuery.fn.extend({
            setAsInput: function(){
                return this.each(function(){
                    $(this).attr("data-selectAll", "YES")
                    $input = $(this)
                })
            }
        });

        var moveBottom = (function(){
            // console.log (typeof $input)
            if ($input.attr("data-selectAll") === "YES")
            {
                //
            }
            var $tableRow = $table.children("tbody").children("tr").eq(y);
            var $tableData = $tableRow.children("td,th").eq(x);

            if (isSubTable)
            {
                $tableRow.children("td,th").eq(x).find('.form-control').first().focus().select().setAsInput();
                return;
            }

            $input.removeAttr("data-selectAll");
            $tableData.find(".form-control").focus().select().setAsInput()
        });

        //NAVIGATOR
        $(document).find($table).on("keypress", function(event) {
            // $input = $(event.target).parent(".form-control");
            var keyCode = event.keyCode;
            if(keyCode !== 13) return;
            event.preventDefault();
            y++;
            moveBottom();
        });

        //NAVIGATOR
        $(document).find($table).on("keydown", function(event) {
            var keyCode = event.keyCode;

            switch(keyCode) {
                case 37:
                    event.preventDefault();
                    x--;
                    break;
                case 38:
                    event.preventDefault();
                    y--;
                    break;
                case 39:
                    event.preventDefault();
                    x++;
                    break;
                case 40:
                    event.preventDefault();
                    y++;
                    break;
                default:
                    return;
                    break;
            }

            if (x<0) {
                x = 0;
            }

            if (y<0) {
                y = 0;
            }

            moveBottom();
        });

        //INITIATOR
        $(document).find($table).on("click", ".form-control", function(){
            if (isSubTable) {
                return;
            }

            $table = $(this).closest(table);
            $(this).setAsInput();
            
            x = $table.find($(this)).closest("td").index();
            y = $table.find($(this)).closest("tr").index();
        });

        //Databanding
        $(document).find($table).children("tbody").children("tr").children("td").children(".form-control").on("focus", function(even){
            x = $table.find($(this)).closest("td").index();
            y = $table.find($(this)).closest("tr").index();
            isSubTable = false;
        });

        // Databanding Adjustment
        $(document).find($table).find("table").find("td .form-control").on("focus", function(even){
            var $tr = $(this).closest('table').parent('td').parent('tr');
            var $td = $(this).closest('table').parent('td');
            $table.children("tbody").children("tr").each(function(i){
                if ($(this).is($tr))
                {
                    y = i;

                    $(this).children("td,th").each(function(i){
                        if ($(this).is($td))
                        {
                            x = i;
                        }
                    });
                    isSubTable = true;
                }
            });
            return;
        });
    })();
});

//PREDEFINED DEPRESIASI SARANA PELENGKAP
$(function(){

    if (["1","2","5"].indexOf(id_jenis_objek)==-1){
        return;
    }

    $.post(base_url+"new/depresiasi_sarana_pelengkap/get_list_json",{id_jenis_objek:id_jenis_objek}).done(function(d){
        var data;
        try {
            data=JSON.parse(d);
        }catch(e){
            console.log(e);
        }

        $.each(data,function(i,v){
            var id_field = v.id_field;
            var nilai = v.nilai;
            $('[data-id-field="'+id_field+'"]').val(nilai);
        })
    })
});