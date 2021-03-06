<?php
namespace app\components;


class Constant {
    const PELATIHAN_DASAR = 1;
    const PELATIHAN_TINGKAT_LANJUT_1 = 2;
    const PELATIHAN_TINGKAT_LANJUT_2 = 3;

    const KEHADIRAN_HADIR = 1;
    const KEHADIRAN_TIDAK_HADIR = 2;

    const STATUS_PELENGKAPAN_DATA = 1;
    const STATUS_MENUNGGU_PERSETUJUAN = 2;
    const STATUS_DISETUJUI = 3;
    const STATUS_PENGAJUAN_MONEV = 4;
    const STATUS_SELESAI = 5;

    const SOAL_JENIS_PRETEST= 1;
    const SOAL_JENIS_POSTTEST = 2;
    const SOAL_JENIS_PRAKTEK = 3;
    const SOAL_JENIS_KUESIONER_KEPUASAN = 4;
    const SOAL_JENIS_KUESIONER_MONEV = 5;

    const SOAL_TYPE_PILIHAN_GANDA = 1;
    const SOAL_TYPE_ESSAY = 2;
    const SOAL_TYPE_CHECKBOX = 3;
    const SOAL_TYPE_JAWABAN_SINGKAT = 4;

    const NILAI_MAKSIMAL = 100;

    
    const DEFAULT_PENGISIAN_KUESIONER = 120;

    const LIMIT_SOAL = 3;
}