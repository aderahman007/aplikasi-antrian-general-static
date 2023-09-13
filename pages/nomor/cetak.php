<?php
require __DIR__ . '/../../vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

try {
    // Enter the share name for your USB printer here
    // $connector = "MacBook-Pro.local";
    $connector = new WindowsPrintConnector("STMicroelectronics_POS80_Printer_USB");

    /* Print a "Hello world" receipt" */
    $printer = new Printer($connector);
    $printer->text("Hello World!\n");
    $printer->cut();

    /* Close printer */
    $printer->close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
}