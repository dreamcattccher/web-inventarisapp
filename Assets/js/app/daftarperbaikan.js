var mode = "";
$(document).ready(function(){
    tampilDaftarperbaikan();
      
    $("#reload").click(function(){
        tampilDaftarperbaikan();
    } );

    $("#tambah").click(function(){
        mode = "add";
        $("form")[0].reset();
        $("#mode").html("Tambah");
            $("span.help-block").remove();
            $(".form-group").removeClass("has-error");
            $("input[name='idperbaikan']").removeAttr("readonly");
            $("#form-perbaikan").modal("show");
    });

    $("tbody").on("click","#rubah",function(){
        mode = "edit";
        var id = $(this).data("id");
        
        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");

            //attr = atribut, perintah dibawah digunakan untuk menonaktifkan kolom nim agar tdk dapat diubah
        $("input[name='idperbaikan']").attr("readonly",true);

       bacaDaftarperbaikan(id);

    });

    $("tbody").on("click","#hapus",function(){
        var id = $(this).data("id");
        hapusDaftarperbaikan(id);
    });

    $("#simpan").click(function(){
        simpanDaftarperbaikan();
    });
})

function showMessage(mode){
    var divMessage =    "<div class='alert alert-success'>" +
                            "Berhasil <strong> " + mode.toUpperCase()+ "</strong> Data Daftarperbaikan" +
                        "</div>";
    $(divMessage)
    //.prependTo digunakan untuk menyisipkan pesan message kedalam kelas container
    //.delay(1000)= tampilannya menunnggu 1 detik
    //.slideUp=animasi menghilangkan
        .prependTo(".container")
        .delay(1000)
        .slideUp("slow");
}

function hapusDaftarperbaikan(id){
    if(confirm("Anda yakin hapus?")){
        $.ajax({
        url: "daftarperbaikan/hapus/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
                if(data.status){
                    tampilDaftarperbaikan();
                    showMessage("delete");
                }
            }
        });
    }
}

function bacaDaftarperbaikan(id){
    $("form")[0].reset();
           
        $.ajax({
            url: "daftarperbaikan/baca/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                $("#idperbaikan").val(data.idperbaikan);
                $("#namaasset").val(data.namaasset);
                $("#tanggalpengaduan").val(data.tanggalpengaduan);;
                $("#status").val(data.status);
                $("#noruang").val(data.noruang)
            

                $("#mode").html("Rubah");
                $("#form-perbaikan").modal("show");

            }
        })
    }

    function simpanDaftarperbaikan(){
        $.ajax({
            type: "POST",
            url: "daftarperbaikan/simpan/"+mode,
            data: $("form").serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilDaftarperbaikan();
                    showMessage(mode);
                    $("#form-daftarperbaikan").modal("hide");
                }else{
                    $("span.help-block").remove();
                    $(".form-group").removeClass("has-error");


                    $.each(data.message,function(index,value){
                       if(value){
                        $("input[name="+index+"]")
                        .after(value)
                        .parent()
                        .addClass("has-error");
                       }
                    });
                }
            }
        })
    }

    function tampilDaftarperbaikan(){
        $.ajax({
            type: "ajax",
            url: "daftarperbaikan/data",
            dataType: "JSON",
            success: function(data){
                var html = "";
                for(i=0;i < data.length;i++){
                html +=  "<tr>" +
                                  "<td>"+ data[i].idperbaikan +"</td>" +
                                  "<td>"+ data[i].namaasset +"</td>" +
                                  "<td>"+ data[i].tanggalperbaikan +"</td>" +
                                  "<td>"+ konversiStatusperbaikan(data[i].status) +"</td>" +
                                  "<td>"+ data[i].noruang +"</td>" +
                                  "<td><button id='rubah' class='btn btn-warning btn-block' data-id='" + data[i].idperbaikan + "'>" +
                                      "<span class='glyphicon glyphicon-pencil'></span> Rubah </button>" +
                                  "</td>" +
                                  "<td><button id='hapus' class='btn btn-danger btn-block' data-id='" + data[i].idperbaikan + "'>" +
                                      "<span class='glyphicon glyphicon-trash'></span> Hapus </button>" +
                                  "</td>" +
                        "</tr>";
                }
                $("tbody").html(html);
              }
          })
    }