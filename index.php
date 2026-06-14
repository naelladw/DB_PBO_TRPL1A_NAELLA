<?php

require_once "koneksi/database.php";
require_once "models/TiketRegular.php";
require_once "models/TiketIMAX.php";
require_once "models/TiketVelvet.php";

$query = mysqli_query($koneksi, "SELECT * FROM tabel_tiket");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Tiket Bioskop</title>
    <style>
        table{
            border-collapse: collapse;
            width:100%;
        }

        th,td{
            border:1px solid black;
            padding:8px;
        }

        th{
            background:#ddd;
        }
    </style>
</head>
<body>

<h2>Daftar Tiket Bioskop</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Film</th>
        <th>Studio</th>
        <th>Kursi</th>
        <th>Fasilitas</th>
        <th>Total Harga</th>
    </tr>

<?php

while($row = mysqli_fetch_assoc($query))
{
    switch($row['jenis_studio'])
    {
        case 'Regular':

            $tiket = new TiketRegular(
                $row['id_tiket'],
                $row['nama_film'],
                $row['jadwal_tayang'],
                $row['jumlah_kursi'],
                $row['harga_dasar_tiket'],
                $row['tipe_audio'],
                $row['lokasi_baris']
            );

            break;

        case 'IMAX':

            $tiket = new TiketIMAX(
                $row['id_tiket'],
                $row['nama_film'],
                $row['jadwal_tayang'],
                $row['jumlah_kursi'],
                $row['harga_dasar_tiket'],
                $row['kacamata_3d_id'],
                $row['efek_gerak_fitur']
            );

            break;

        case 'Velvet':

            $tiket = new TiketVelvet(
                $row['id_tiket'],
                $row['nama_film'],
                $row['jadwal_tayang'],
                $row['jumlah_kursi'],
                $row['harga_dasar_tiket'],
                $row['bantal_selimut_pack'],
                $row['layanan_butler']
            );

            break;
    }

    echo "
    <tr>
        <td>{$row['id_tiket']}</td>
        <td>{$row['nama_film']}</td>
        <td>{$row['jenis_studio']}</td>
        <td>{$row['jumlah_kursi']}</td>
        <td>".$tiket->tampilkanInfoFasilitas()."</td>
        <td>Rp ".number_format($tiket->hitungTotalHarga(),0,',','.')."</td>
    </tr>";
}
?>

</table>

</body>
</html>