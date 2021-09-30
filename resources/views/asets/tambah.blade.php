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
                <h3>Tambah aset</h3>
                <form method="POST" action="/v1/aset">
                    <table border="1" class="table table-stripped">
                        <tr>
                            <th>Jenis</th>
                            <th>Branch</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                        </tr>

                        <tr>
                            <td><select name="id_jenis" class="form-select" aria-label="Default select example">
                                    <option selected>Pilih jenis</option>
                                    <div class="form-control">
                                        @foreach($aset as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                        @endforeach
                                    </div>

                                </select></td>
                            <td> <select name="id_branch" class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Branch</option>
                                    <div class="form-control">
                                        @foreach($branch as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                        @endforeach
                                    </div>

                                </select> </td>
                            <td>
                                <select name="bulan" class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </td>
                            <td>
                                <select name="tahun" class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Tahun</option>
                                    <option value="15">2015</option>
                                    <option value="16">2016</option>
                                    <option value="17">2017</option>
                                    <option value="18">2018</option>
                                    <option value="19">2019</option>
                                    <option value="20">2020</option>
                                    <option value="21">2021</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>