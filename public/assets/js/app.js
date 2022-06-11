$(function(){
    "use strict";
    
    $("html.active .editable-tags").attr('contenteditable', true);
    
    var data = {};
    // $(".editable-tags").on("focus", function(){
    //     var content = $(this).text();
    //     data["old_text"] = content;
    // });
    $(".editable-tags").on("focusout", function(){
        // console.log($(this).html());
        var key = $(this).attr("id");
        var content = $(this).text();

        data["key"] = key;
        data["text"] = content;

        if( data["old_text"] != data["text"] ){
            $(".confirmation-bar").addClass("show");
            $.ajax({
                type: 'post',
                data: {data:data},
                headers: {'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')},
                url: '/save-content',
                success:function(ajaxResponse){
                    console.log(ajaxResponse);
                } // success  end
            }); // ajax end
        } else{
            console.log("Aynı değer");
        }
    });

    // $(".editable-tags").editable({
    //     showbuttons: true,
    //     callback: function(data){
    //         if(data.content){
    //             console.log('data is changed');
    //             console.log(data);
    //             console.log($(this));
    //         }
    //     }
    // });

    $(".yayimla").on("click", function(){
        $.ajax({
            type: 'get',
            url: '/yayimla',
            success:function(ajaxResponse){
                if(ajaxResponse == "success"){
                    $(".confirmation-bar").removeClass("show");
                }
            } // success  end
        }); 
    });
});
