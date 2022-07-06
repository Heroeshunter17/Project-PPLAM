// var cari = document.getElementById("cari");
// cari.addEventListener("keyup", function() {
//     $.ajax({
//         url: "data2.php",
//         data: { cari: cari.value },
//         type: "get",
//         async: true,
//         dataType: "json",
//         success: function(response) {
//             var panjang = response.length
//             var data = $('#datacari');
//             data.html("");
//             if (panjang == 0) {
//                 data.html('<td>Data tidak ditemukan<td>');
//             } else {
//                 for (var i = 0; i < panjang; i++) {
//                     console.log(response[i]["nama"])
//                     console.log(response[i]["gambar"])
//                     console.log(response[i]["harga"])
//                     data.append(' <tr><td><img src="./img/' + response[i]["gambar"] + '" alt="tidak" width="200"></td><td>' + response[i]["nama"] + '</td><td>' + response[i]["banyak_barang"] + " " + '' + response[i]["jumlah"] + '</td><td>' + response[i]["harga"] + " / " + '' + response[i]["jumlah"] + '</td></tr>');
//                 }
//             }
//         },
//     });
// });


document.getElementById("hidden").style.visibility = "hidden";
document.getElementById("hidden2").style.visibility = "hidden";
document.getElementById("hidden3").style.visibility = "hidden";
document.getElementById("hidden4").style.visibility = "hidden";
document.getElementById("hidden5").style.visibility = "hidden";
// $.document.querySelector("#hidden").hidden = true;
// $.document.querySelector("#hidden2").hidden = true;
// $.document.querySelector("#hidden3").hidden = true;
// $.document.querySelector("#hidden4").hidden = true;
// document.querySelector("#title").hidden()

// function hide() {
//     const hidden = document.querySelector("#hidden")
//     hidden.hidden()
// }

// document.getElementById("hidden");

// const hide = document.getElementById("hidden");
// for (const e of hide) {
//     e.style.visibility = "hidden";
// }

$(document).ready(function() {
    $.get("pengeluaran.php", function() {
        $.each("#hidden", function() {
            $("#hidden").style.visibility = "hidden";

        });
    });
});