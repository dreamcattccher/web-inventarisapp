var mode = "";
$(document).ready(function(){
    $("#filter").click(function(){
        // var idasset = $("#idasset").val();
        var cnoruang = $("#cnoruang").val();
        // alert(cnoruang);
        ambilJadwalperawatan(cnoruang);
    });
      
    //$("#reload").click(function(){
        //tampilJadwalperawatan();
    //} );

    $("#tambah").click(function(){
        mode = "add";
        $("form")[0].reset();
        $("#mode").html("Tambah");
            $("span.help-block").remove();
            $(".form-group").removeClass("has-error");
            $("input[name='idasset']").removeAttr("readonly");
            $("#form-jadwalperawatan").modal("show");
    });

    $("tbody").on("click","#rubah",function(){
        mode = "edit";
        var id = $(this).data("id");
        
        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");

            //attr = atribut, perintah dibawah digunakan untuk menonaktifkan kolom nim agar tdk dapat diubah
        $("input[name='idasset']").attr("readonly",true);

       bacaJadwalperawatan(id);

    });

    $("tbody").on("click","#hapus",function(){
        var id = $(this).data("id");
        hapusJadwalperawatan(id);
    });

    $("#simpan").click(function(){
        simpanJadwalperawatan();
    });
})

function showMessage(mode){
    var divMessage =    "<div class='alert alert-success'>" +
                            "Berhasil <strong> " + mode.toUpperCase()+ "</strong> Data Jadwalperawatan" +
                        "</div>";
    $(divMessage)
    //.prependTo digunakan untuk menyisipkan pesan message kedalam kelas container
    //.delay(1000)= tampilannya menunnggu 1 detik
    //.slideUp=animasi menghilangkan
        .prependTo(".container")
        .delay(1000)
        .slideUp("slow");
}

function hapusJadwalperawatan(id){
    if(confirm("Anda yakin hapus?")){
        $.ajax({
        url: "jadwalperawatan/hapus/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
                if(data.status){
                    tampilJadwalperawatan();
                    showMessage("delete");
                }
            }
        });
    }
}

function bacaJadwalperawatan(id){
    $("form")[0].reset();
           
        $.ajax({
            url: "jadwalperawatan/baca/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                $("#idasset").val(data.idasset);
                $("#namaasset").val(data.namaasset);
                $("#tanggalperawatan").val(data.tanggalperawatan);
                $("#noruang").val(data.noruang);


                $("#mode").html("Rubah");
                $("#form-jadwalperawatan").modal("show");

            }
        })
    }

    function simpanJadwalperawatan(){
        $.ajax({
            type: "POST",
            url: "jadwalperawatan/simpan/"+mode,
            data: $("form").serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilJadwalperawatan();
                    showMessage(mode);
                    $("#form-jadwalperawatan").modal("hide");
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

    function ambilJadwalperawatan(cnoruang){
        $.ajax({
            type: "POST",
            url: "jadwalperawatan/ambiljadwalperawatan/"+cnoruang,
            dataType: "JSON",
            success: function(data){
                var html = "";
                for(i=0;i < data.length;i++){
                html +=  "<tr>" +
                                  "<td>"+ data[i].idasset +"</td>" +
                                  "<td>"+ data[i].namaasset +"</td>" +
                                  "<td>"+ data[i].tanggalperawatan +"</td>" +
                                  "<td>"+ data[i].noruang +"</td>" +
                                  "<td><button id='rubah' class='btn btn-warning btn-block' data-id='" + data[i].idasset + "'>" +
                                      "<span class='glyphicon glyphicon-pencil'></span> Rubah </button>" +
                                  "</td>" +
                                  "<td><button id='hapus' class='btn btn-danger btn-block' data-id='" + data[i].idasset + "'>" +
                                      "<span class='glyphicon glyphicon-trash'></span> Hapus </button>" +
                                  "</td>" +
                        "</tr>";
                }
                $("tbody").html(html);
              }
          })
    }