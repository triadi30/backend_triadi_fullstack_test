<!DOCTYPE html>
<html>

<head>
    <title>Pengelolaan Data ASET</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Data aset</h3>

                <a href="/aset/tambah"> + Tambah aset Baru</a>

                <br />
                <br />

                <table border="1" class="table table-stripped">
                    <tr>
                        <th>Kode Unik</th>
                        <th>QR Code</th>
                        <!-- <th>Opsi</th> -->
                    </tr>
                    @foreach($aset as $p)
                    <tr>
                        <td>{{ $p->kode_unik }}</td>
                        <td> <img src="{{ $p->link_qr_code }}" alt=""> </td>
                        <!-- <td>
                            <a href="/aset/edit/{{ $p->id }}">Edit</a>
                            |
                            <a href="/aset/hapus/{{ $p->id }}">Hapus</a>
                        </td> -->
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

</body>

</html>