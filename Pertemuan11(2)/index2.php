<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Contoh post Form</h2>
    <form method = "POST" action="Proses.php">
            <label for = "nama">Nama</label>
            <input id = "nama" name="nama" typ="text" placeholder="Nama Anda">
            <br/>
            <label for = "email">Email</label>
            <input id = "email" name="email" typ="email" placeholder="nama@email.com">
            <br/>
            <label for = "pesan">Pesan</label>
            <input id = "pesan" name="pesan" rows="4" placeholder="Isi pesan Anda "></textarea>
            <br/>
            <button type = "submit"> Kirim (Post)</button>
    </form>
</body>
</html>