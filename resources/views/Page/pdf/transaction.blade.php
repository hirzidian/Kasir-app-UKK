<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 20px;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
        }
        .card {
            border: 1px solid #000;
            padding: 15px;
            margin-bottom: 20px;
        }
        .card-header {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Detail Transaksi</div>
            <p><b>Member Status:</b> Member</p>
            <p><b>No. HP:</b> 081234567890</p>
            <p><b>Bergabung Sejak:</b> 14-04-2025</p>
            <p><b>Poin Member:</b> 1200</p>
        </div>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Sub total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Produk A</td>
                        <td>2</td>
                        <td>Rp10.000</td>
                        <td>Rp20.000</td>
                    </tr>
                    <tr>
                        <td>Produk B</td>
                        <td>1</td>
                        <td>Rp15.000</td>
                        <td>Rp15.000</td>
                    </tr>
                    <tr>
                        <td>Produk C</td>
                        <td>3</td>
                        <td>Rp5.000</td>
                        <td>Rp15.000</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td class="text-right"><b>Total Harga</b></td>
                        <td><b>Rp50.000</b></td>
                    </tr>
                    <tr>
                        <td><b>Poin Digunakan</b></td>
                        <td class="text-right"><b>Rp5.000</b></td>
                        <td class="text-right"><b>Harga Setelah Poin</b></td>
                        <td><b>Rp45.000</b></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td class="text-right"><b>Total Kembalian</b></td>
                        <td><b>Rp10.000</b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
