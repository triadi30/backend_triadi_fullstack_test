<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="jquery-1.11.1.min.js"></script>

    <style type="text/css">
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        div.popup {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .8);
        }

        div#box {
            margin: 5% auto;
            background: #fff;
            width: 50%;
            height: 50%;
            -webkit-box-shadow: 0 0 15px #000;
            -moz-box-shadow: 0 0 15px #000;
            box-shadow: 0 0 15px #000;
        }
    </style>
</head>

<body>
    <!-- bagian popup -->
    <div class="popup">
        <div id="box">
            <center>
                <h2> {{ $hasil }} </h2>
                <a href="/"> Kembali ke beranda</a>
            </center>

        </div>
    </div>
    <!-- akhir dari popup -->



</body>

</html>