$(function(i){
    $("#datepicker").flatpickr({
        dateFormat: 'd-m-Y',
        altInput: true,
        altFormat: 'j F Y',
        locale: 'tr'
    });

    $(".delete").on('click', function(e){
        e.preventDefault();
        var href = $( this ).attr( 'href' );
        Swal.fire({
            title: '<strong>Veri Silinecek</strong>',
            icon: 'info',
            text:'Veriyi silmek istediğinize emin misiniz?',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
              'Evet',
            cancelButtonText:
              'Hayır',
          }).then(( result ) => {
              if( result.isConfirmed ) {
                  window.location.href = href;
              }
          })
    });

    $(".phone").mask('(500) 000 00 00');
    $("select").select2();


    $(".btn-payment").on("click", function(){
        var id = $(this).data("id");
        Swal.fire({
            title: '<strong>Borç Ödeme</strong>',
            icon: 'info',
            text:'Borç durumunu değiştirmek istediğinize emin misiniz?',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
              'Evet',
            cancelButtonText:
              'Hayır',
          }).then(( result ) => {
              if( result.isConfirmed ){
                $.ajax({
                    type:'post',
                    data:'odeme_durumu=1&id='+id,
                    url:'/admin/ajax/odeme',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                    success:function(ajaxResponse){
                      if( ajaxResponse ){
                          location.reload();
                      } else{
                          Swal.fire(
                              "Hata",
                              "Ödeme işlemi yapılamadı",
                              "error"
                          )
                      }
                    }
                });
              }
          })
    });
    var elem = document.querySelectorAll('.switchery');
    elem.forEach(item => {
        new Switchery(item);
    })
    
    $("#sayfatipi").on("change", function(){
        var value = $( this ).val();
        console.log(value);
        $(".page-type").addClass("d-none");
        $(`#${value}`).removeClass("d-none");
        if( value == "modul" ){
            $("#page").select2();
        }
    });

    $("#image-button").on("change", function(){
        var file = $("#image-button").get(0).files[0];
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#image-box img").attr("src", reader.result);
                $("#image-box").removeClass("d-none");
            }
 
            reader.readAsDataURL(file);
        }
    });

    $("#ikon-image-button").on("change", function(){
        var file = $("#ikon-image-button").get(0).files[0];
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#ikon-image-box img").attr("src", reader.result);
                $("#ikon-image-box").removeClass("d-none");
            }
 
            reader.readAsDataURL(file);
        }
    });

    $(".gallery-images").on("change", function(){
        var filesLength = $(".gallery-images").get(0).files.length;
        var files = $(".gallery-images").get(0).files;
        for (let i = 0; i < filesLength; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
                var _galleryTemplate = `
            <div id="image-1" class="gallery-box">
                <img src="${event.target.result}" alt="">
            </div>`;
                $(".gallery-content").append(_galleryTemplate);
                // $($.parseHTML('<img>')).attr('src', ).appendTo(placeToInsertImagePreview);
            }

            reader.readAsDataURL(this.files[i]);
            
        }
    });

    $(".file-images").on("change", function(){
        var filesLength = $(".file-images").get(0).files.length;
        var files = $(".file-images").get(0).files;
        for (let i = 0; i < filesLength; i++) {
            var reader = new FileReader();
            if( files[i].type != "application/pdf" ){
                $.toast({
                    // heading: 'Positioning',
                    position: "top-right",
                    text:   "Sadece pdf dosyası yükleyebilirsiniz.",
                    icon: "error"
                });
                return false;
            }
            reader.onload = function(event) {
                var _galleryTemplate = `
            <div id="image-1" class="gallery-box">
                <div class="filename">${files[i].name}</div>
                <img src="/assets/images/pdf-icon.jpg" alt="">
            </div>`;
                $(".gallery-content").append(_galleryTemplate);
                // $($.parseHTML('<img>')).attr('src', ).appendTo(placeToInsertImagePreview);
            }

            reader.readAsDataURL(this.files[i]);
            
        }
    });


    $(".gallery-remove").on("click", function(){
        var target = $(this).data("target");
        var id = $(this).data("id");
        Swal.fire({
            title: '<strong>Uyarı</strong>',
            icon: 'info',
            text:'Resimi silmek istediğinize emin misiniz?',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
              'Evet',
            cancelButtonText:
              'Hayır',
          }).then(( result ) => {
              if( result.isConfirmed ){
                  $.ajax({
                      type:'get',
                      url:'/admin/ajax/deleteGallery/'+id,
                      success:function(ajaxResponse){
                        if( ajaxResponse == 'success' ){
                            $(target).remove();
                            $.toast({
                                // heading: 'Positioning',
                                position: "top-right",
                                text:   "İşlem başarılı!",
                                icon: "success"
                            });
                        } else{
                            $.toast({
                                // heading: 'Positioning',
                                position: 'top-right',
                                text:'İşlem başarısız!',
                                icon: 'success'
                            });
                        }
                      }
                  });
              }
          })
    });

    $('.seo-title').maxlength({ threshold: 64, warningClass:"badge bg-success",limitReachedClass:"badge bg-danger" });
    $('.seo-description').maxlength({ threshold: 300, warningClass:"badge bg-success",limitReachedClass:"badge bg-danger" });
    $('.seo-keywords').maxlength({ threshold: 120, warningClass:"badge bg-success",limitReachedClass:"badge bg-danger" });

    $(".editable").editable({
        callback: function(data){
            if(data.content){
                console.log('data is changed');
                console.log(data);
            }
        }
    });

    $
    $("#sortable").sortable({
        update: function(event, ui){
            var list = $(this).sortable('serialize'); 
            var table = $(this).data('table');
            $.ajax({
                type: 'post',
                data: `${list}&table=${table}`,
                headers: {'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')},
                url:'/admin/ajax/sortable',
                success:function(ajaxResponse){
                    if(ajaxResponse == 'success'){
                        $.toast({
                            // heading: 'Positioning',
                            position: "top-right",
                            text:   "Sıralama işlemi başarılı!",
                            icon: "success"
                        });
                    }
                }
            });
        }
    });

    $("#baslik").stringToSlug();

    var editor = $("#editor");
    $("form").on('submit', function(){
        if( editor.length > 0 ){
            console.log(editor.val());
            if(editor.val() == ""){
                $.toast({
                    // heading: 'Positioning',
                    position: "top-right",
                    text:   "İcerik alanı boş bırakılamaz!",
                    icon: "error"
                });
                return false;
            }
        }
    });
    
});