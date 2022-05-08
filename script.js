var cari = document.getElementById("cari");
cari.addEventListener("keyup", function() {
    $.ajax({
        url: "data2.php",
        data: { cari: cari.value },
        type: "get",
        async: true,
        dataType: "json",
        success: function(response) {
            var panjang = response.length
            var data = $('#datacari');
            data.html("");
            if (panjang == 0) {
                data.html('<td>Data tidak ditemukan<td>');
            } else {
                for (var i = 0; i < panjang; i++) {
                    console.log(response[i]["nama"])
                    console.log(response[i]["gambar"])
                    console.log(response[i]["harga"])
                    data.append(' <tr><td><img src="./img/' + response[i]["gambar"] + '" alt="tidak" width="200"></td><td>' + response[i]["nama"] + '</td><td>' + response[i]["banyak_barang"] + " " + '' + response[i]["jumlah"] + '</td><td>' + response[i]["harga"] + " / " + '' + response[i]["jumlah"] + '</td></tr>');
                }
            }
        },
    });
});