function konversiStatus(nilai){
    var hasil = "";
    switch(nilai){
        case "DT": hasil = "Diterima"; break;
        case "M": hasil = "Menunggu"; break;
        case "DP": hasil = "Dalam Proses"; break;
    }
    return hasil;
}

function konversiStatusperbaikan(nilai){
    var hasil = "";
    if(nilai=="selesai"){
        hasil = "Selesai";
    }else if(nilai=="dalamproses"){
        hasil = "Dalam Proses"
    }
    return hasil;
}

function konversiJenis(nilai){
    var hasil = "";
    if(nilai=="EL"){
        hasil = "Elektronik";
    }else if(nilai=="NE"){
        hasil = "Non-Elektronik"
    }
    return hasil;
}



function konversiStatusUser(nilai){
    var hasil = "";
    if(nilai=="MHS"){
        hasil = "Mahasiswa";
    }else if(nilai=="ADM"){
        hasil = "Akademik"
    }
    return hasil;
}