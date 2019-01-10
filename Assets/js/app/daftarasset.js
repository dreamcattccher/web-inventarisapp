var mode = "";
$(document).ready(function(){
    tampilDaftarasset();
      
    $("#reload").click(function(){
        tampilDaftarasset();
    } );

    $("#tambah").click(function(){
        mode = "add";
        $("form")[0].reset();
        $("#mode").html("Tambah");
            $("span.help-block").remove();
            $(".form-group").removeClass("has-error");
            $("input[name='idasset']").removeAttr("readonly");
            $("#form-daftarasset").modal("show");
    });

    $("tbody").on("click","#rubah",function(){
        mode = "edit";
        var id = $(this).data("id");
        
        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");

            //attr = atribut, perintah dibawah digunakan untuk menonaktifkan kolom nim agar tdk dapat diubah
        $("input[name='idasset']").attr("readonly",true);

       bacaDaftarasset(id);

    });

    $("tbody").on("click","#hapus",function(){
        var id = $(this).data("id");
        hapusDaftarasset(id);
    });

    $("#simpan").click(function(){
        simpanDaftarasset();
    });
})

function showMessage(mode){
    var divMessage =    "<div class='alert alert-success'>" +
                            "Berhasil <strong> " + mode.toUpperCase()+ "</strong> Data Daftarasset" +
                        "</div>";
    $(divMessage)
    //.prependTo digunakan untuk menyisipkan pesan message kedalam kelas container
    //.delay(1000)= tampilannya menunnggu 1 detik
    //.slideUp=animasi menghilangkan
        .prependTo(".container")
        .delay(1000)
        .slideUp("slow");
}

function hapusDaftarasset(id){
    if(confirm("Anda yakin hapus?")){
        $.ajax({
        url: "daftarasset/hapus/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
                if(data.status){
                    tampilDaftarasset();
                    showMessage("delete");
                }
            }
        });
    }
}

function bacaDaftarasset(id){
    $("form")[0].reset();
           
        $.ajax({
            url: "daftarasset/baca/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                $("#idasset").val(data.idasset);
                $("#namaasset").val(data.namaasset);
                $("#satuan").val(data.satuan);
                $("#jenis").val(data.jenis);
                $("#kondisi").val(data.kondisi);
                $("#noruang").val(data.noruang);


                $("#mode").html("Rubah");
                $("#form-daftarasset").modal("show");

            }
        })
    }

    function simpanDaftarasset(){
        $.ajax({
            type: "POST",
            url: "daftarasset/simpan/"+mode,
            data: $("form").serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilDaftarasset();
                    showMessage(mode);
                    $("#form-daftarasset").modal("hide");
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

    function tampilDaftarasset(){
        $.ajax({
            type: "ajax",
            url: "daftarasset/data",
            dataType: "JSON",
            success: function(data){
                var html = "";
                for(i=0;i < data.length;i++){
                html +=  "<tr>" +
                                  "<td>"+ data[i].idasset +"</td>" +
                                  "<td>"+ data[i].namaasset +"</td>" +
                                  "<td>"+ data[i].satuan +"</td>" +
                                  "<td>"+ konversiJenis(data[i].jenis) +"</td>" +
                                  "<td>"+ data[i].kondisi +"</td>" +
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