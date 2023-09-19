<?php
    require __DIR__ . '/../../vendor/autoload.php';

    use Mike42\Escpos\Printer;
    use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

    function cetak($no_antrian){
        $hariIni = new DateTime();

        try {
            // Enter the share name for your USB printer here
            // $connector = "MacBook-Pro.local";
            $connector = new WindowsPrintConnector("smb://192.168.1.38/pos-80");

            /* Print a "Hello world" receipt" */
            $printer = new Printer($connector);
            $printer->initialize();
            
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setEmphasis(true);
            $printer->setFont(Printer::FONT_A);
            $printer->setTextSize(2, 1);
            $printer->text("RSUD BATIN MANGUNANG\n");
            $printer->selectPrintMode(); // Reset\
            $printer->setFont(Printer::FONT_B);
            $printer->setTextSize(7, 4);
            $printer->text("Jl. Soekarno Hatta, Komplek Islamic Centre\n");
            $printer->text("Kota Agung, Tanggamus\n");
            $printer->text("==================================================\n\n");
            $printer->selectPrintMode(); // Reset

            $printer->setFont(Printer::FONT_B);
            $printer->setTextSize(2, 1);
            $printer->text("NOMOR ANTRIAN ANDA\n\n");
            $printer->selectPrintMode(); // Reset
            $printer->setFont(Printer::FONT_B);
            $printer->setTextSize(4, 4);
            $printer->text($no_antrian . "\n\n\n");
            $printer->selectPrintMode(); // Reset

            $printer->setFont(Printer::FONT_B);
            $printer->setTextSize(7, 4);
            $printer->text("Silahkan menunggu nomor antrian dipanggil\n");
            $printer->text("Nomor ini hanya berlaku pada hari dicetak\n");
            $printer->text(hariIndo(date('l')) . " " . strftime('%d %B %Y', $hariIni->getTimestamp()) . "\n\n");

            $printer->selectPrintMode(); // Reset
            $printer->setFont(Printer::FONT_B);
            $printer->setTextSize(2, 1);
            $printer->text("TERIMA KASIH, ANDA TELAH TERTIB\n\n\n\n\n");
            $printer->selectPrintMode(); // Reset

            $printer->cut();

            /* Close printer */
            $printer->close();
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
        }
    }


    function hariIndo ($hariInggris) {
        switch ($hariInggris) {
        case 'Sunday':
            return 'Minggu';
        case 'Monday':
            return 'Senin';
        case 'Tuesday':
            return 'Selasa';
        case 'Wednesday':
            return 'Rabu';
        case 'Thursday':
            return 'Kamis';
        case 'Friday':
            return 'Jumat';
        case 'Saturday':
            return 'Sabtu';
        default:
            return 'hari tidak valid';
        }
    }
