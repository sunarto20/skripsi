// document
//     .getElementById("reportSiswa")
//     .addEventListener("click", function (event) {
//         event.preventDefault();
//         document.getElementById("laporan").innerHTML = `<h1>dasdas</h1>`;
//     });

// document
//     .getElementById("reportKelas")
//     .addEventListener("click", function (event) {
//         event.preventDefault();
//         document.getElementById(
//             "laporan"
//         ).innerHTML = `<h1>Ini Data Kelas</h1>`;
//     });

// Report Siswa
$("#reportItem").click(function (e) {
    e.preventDefault();
    // console.log("dasdas");
    $("#laporan").html(`<form method='get' action="/laporan/item">
        <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="start" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check">
        <input type="checkbox" name="end" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>`);
});
