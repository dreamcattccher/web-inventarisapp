var mode = "";
$(document).ready(function(){
    tampilDaftarpengaduan();
      
    $("#reload").click(function(){
        tampilDaftarpengaduan();
    } );

    $("#tambah").click(function(){
        mode = "add";
        $("form")[0].reset();
        $("#mode").html("Tambah");
            $("span.help-block").remove();
            $(".form-group").removeClass("has-error");
            $("input[name='idpengaduan']").removeAttr("readonly");
            $("#form-pengaduan").modal("show");
    });

    $("tbody").on("click","#rubah",function(){
        mode = "edit";
        var id = $(this).data("id");
        
        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");

            //attr = atribut, perintah dibawah digunakan untuk menonaktifkan kolom nim agar tdk dapat diubah
        $("input[name='idpengaduan']").attr("readonly",true);

       bacaDaftarpengaduan(id);

    });

    $("tbody").on("click","#hapus",function(){
        var id = $(this).data("id");
        hapusDaftarpengaduan(id);
    });

    $("#simpan").click(function(){
        simpanDaftarpengaduan();
    });
})

function showMessage(mode){
    var divMessage =    "<div class='alert alert-success'>" +
                            "Berhasil <strong> " + mode.toUpperCase()+ "</strong> Data Daftarpengaduan" +
                        "</div>";
    $(divMessage)
    //.prependTo digunakan untuk menyisipkan pesan message kedalam kelas container
    //.delay(1000)= tampilannya menunnggu 1 detik
    //.slideUp=animasi menghilangkan
        .prependTo(".container")
        .delay(1000)
        .slideUp("slow");
}

function hapusDaftarpengaduan(id){
    if(confirm("Anda yakin hapus?")){
        $.ajax({
        url: "daftarpengaduan/hapus/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
                if(data.status){
                    tampilDaftarpengaduan();
                    showMessage("delete");
                }
            }
        });
    }
}

function bacaDaftarpengaduan(id){
    $("form")[0].reset();
           
        $.ajax({
            url: "daftarpengaduan/baca/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                $("#idpengaduan").val(data.idpengaduan);
                $("#idperbaikan").val(data.idperbaikan);
                $("#namaasset").val(data.namaasset);
                $("#tanggalpengaduan").val(data.tanggalpengaduan);
                $("#keterangan").val(data.keterangan);
                $("#status").val(data.status);
                $("#noruang").val(data.noruang);


                $("#mode").html("Rubah");
                $("#form-pengaduan").modal("show");

            }
        })
    }

    function simpanDaftarpengaduan(){
        $.ajax({
            type: "POST",
            url: "daftarpengaduan/simpan/"+mode,
            data: $("form").serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilDaftarpengaduan();
                    showMessage(mode);
                    $("#form-daftarpengaduan").modal("hide");
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

    function tampilDaftarpengaduan(){
        $.ajax({
            type: "ajax",
            url: "daftarpengaduan/data",
            dataType: "JSON",
            success: function(data){
                var html = "";
                for(i=0;i < data.length;i++){
                html +=  "<tr>" +
                                  "<td>"+ data[i].idpengaduan +"</td>" +
                                  "<td>"+ data[i].idperbaikan +"</td>" +
                                  "<td>"+ data[i].namaasset +"</td>" +
                                  "<td>"+ data[i].tanggalpengaduan +"</td>" +
                                  "<td>"+ data[i].keterangan +"</td>" +
                                  "<td>"+ konversiStatus(data[i].status) +"</td>" +
                                  "<td>"+ data[i].noruang +"</td>" +
                                  "<td><button id='rubah' class='btn btn-warning btn-block' data-id='" + data[i].idpengaduan + "'>" +
                                      "<span class='glyphicon glyphicon-pencil'></span> Rubah </button>" +
                                  "</td>" +
                                  "<td><button id='hapus' class='btn btn-danger btn-block' data-id='" + data[i].idpengaduan + "'>" +
                                      "<span class='glyphicon glyphicon-trash'></span> Hapus </button>" +
                                  "</td>" +
                        "</tr>";
                }
                $("tbody").html(html);
              }
          })
    }