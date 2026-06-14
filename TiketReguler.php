<?php

require_once "Tiket.php";

class TiketRegular extends Tiket
{
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct(
        $id_tiket,
        $nama_film,
        $jadwal_tayang,
        $jumlah_kursi,
        $hargaDasarTiket,
        $tipeAudio,
        $lokasiBaris
    ) {
        parent::__construct(
            $id_tiket,
            $nama_film,
            $jadwal_tayang,
            $jumlah_kursi,
            $hargaDasarTiket
        );

        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Override method abstract dari class Tiket
    public function hitungTotalHarga()
    {
        return $this->jumlah_kursi * $this->hargaDasarTiket;
    }

    // Override method abstract dari class Tiket
    public function tampilkanInfoFasilitas()
    {
        return "Audio: " . $this->tipeAudio .
               ", Baris: " . $this->lokasiBaris;
    }
}