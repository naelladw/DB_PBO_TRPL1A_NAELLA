<?php

require_once "Tiket.php";

class TiketIMAX extends Tiket
{
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct(
        $id_tiket,
        $nama_film,
        $jadwal_tayang,
        $jumlah_kursi,
        $hargaDasarTiket,
        $kacamata3dId,
        $efekGerakFitur
    ) {
        parent::__construct(
            $id_tiket,
            $nama_film,
            $jadwal_tayang,
            $jumlah_kursi,
            $hargaDasarTiket
        );

        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Override method abstract dari class Tiket
    public function hitungTotalHarga()
    {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 30000;
    }

    // Override method abstract dari class Tiket
    public function tampilkanInfoFasilitas()
    {
        return "Kacamata 3D: " . $this->kacamata3dId .
               ", Efek Gerak: " . $this->efekGerakFitur;
    }
}