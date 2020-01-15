
// menggunakan json
// let karyawan ={
//     nama : "rico tritanto",
//     NIK : 184355,
//     bagian :"EDP"
// }

// console.log(JSON.stringify(karyawan));

//menggunakan vanilla json
// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function() {
//     if(xhr.readyState == 4 && xhr.status == 200){
//         let karyawan = JSON.parse(this.responseText);
//         console.log(karyawan);
//     }
// }

// xhr.open('GET', 'coba.json', true);
// xhr.send();

/* dengan jquery*/

$.getJSON('coba.json', function(data){
    console.log(data);
});