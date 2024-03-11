<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
            padding: 50px;
            margin-top: 50px;
            max-width: 600px;
            margin: auto;
        }

        .container h2 {
            margin-bottom: 30px;
            text-align: center;
            color: #007bff;
            font-weight: bold;
        }

        .form-control, .custom-control-label {
            border-radius: 20px;
        }

        button[type="submit"] {
            border-radius: 20px;
            padding: 10px 30px;
            background-color: #007bff;
            color: #fff;
            border: none;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .custom-radio.horizontal .custom-control {
            display: inline-block;
            margin-right: 20px;
        }

        .result {
            margin-top: 50px;
            background-color: #007bff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
            padding: 30px;
            display: none;
            color: #fff;
        }

        .result h3 {
            margin-bottom: 20px;
        }

        .result p {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .result p strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Belanja</h2>
        <div id="harga_produk">
            <p><strong>Harga Produk:</strong> Rp 0</p>
        </div>
        <form id="shopping-form" action="" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Nama Customer" required>
            </div>
            <div class="form-group">
                <label>Pilihan Produk:</label>
                <div class="custom-radio horizontal">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="televisi" name="produk" class="custom-control-input" value="Televisi" data-harga="1000000" required>
                        <label class="custom-control-label" for="televisi">Televisi</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="kulkas" name="produk" class="custom-control-input" value="Kulkas Dingin" data-harga="2000000" required>
                        <label class="custom-control-label" for="kulkas">Kulkas Dingin</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="kompor" name="produk" class="custom-control-input" value="Kompor Gazz" data-harga="500000" required>
                        <label class="custom-control-label" for="kompor">Kompor Gazz</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
        <div class="result mt-4">
            <h3>Detail Belanja</h3>
            <div id="nama_customer_result"></div>
            <div id="produk_result"></div>
            <div id="harga_result"></div>
            <div id="jumlah_result"></div>
            <div id="total_harga_result"></div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById("shopping-form").addEventListener("submit", function(event) {
            event.preventDefault();

            var nama_customer = document.getElementById("nama_customer").value;
            var produk = document.querySelector('input[name="produk"]:checked').value;
            var harga = parseInt(document.querySelector('input[name="produk"]:checked').getAttribute("data-harga"));
            var jumlah = parseInt(document.getElementById("jumlah").value);
            var total_harga = harga * jumlah;

            document.getElementById("nama_customer_result").innerHTML = "<p><strong>Nama Customer:</strong> " + nama_customer + "</p>";
            document.getElementById("produk_result").innerHTML = "<p><strong>Pilihan Produk:</strong> " + produk + "</p>";
            document.getElementById("harga_result").innerHTML = "<p><strong>Harga:</strong> Rp " + harga + "</p>";
            document.getElementById("jumlah_result").innerHTML = "<p><strong>Jumlah:</strong> " + jumlah + "</p>";
            document.getElementById("total_harga_result").innerHTML = "<p><strong>Total Harga:</strong> Rp " + total_harga + "</p>";

            document.querySelector(".result").style.display = "block";
        });

        document.querySelectorAll('input[name="produk"]').forEach(function(el){
            el.addEventListener('change', function(){
                var harga_produk = this.getAttribute("data-harga");
                document.getElementById("harga_produk").innerHTML = "<p><strong>Harga Produk:</strong> Rp " + harga_produk + "</p>";
            });
        });
    </script>
</body>
</html>
