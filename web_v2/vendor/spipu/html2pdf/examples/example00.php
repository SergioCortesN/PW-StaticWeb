<?php
/**
 * Html2Pdf Library - example
 *
 * HTML => PDF converter
 * distributed under the OSL-3.0 License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2025 Laurent MINGUET
 */
require_once '../../../autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    ob_start();
    include dirname(__FILE__).'/res/example00.php';
    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'en');
    $html2pdf->setDefaultFont('Arial');
    $content = "<table border='1' style='width:100%;'>
    <tr>
        <th>Header 1</th>
        <th>Header 2</th>
        <th>Header 3</th> 
    </tr>
    <tr>
        <td>Row 1 Col 1</td>
        <td>Row 1 Col 2</td>
        <td>Row 1 Col 3</td>
    </tr>
    <tr>
        <td>Row 2 Col 1</td>
        <td>Row 2 Col 2</td>
        <td>Row 2 Col 3</td>
    </tr>
</table>";
    $html2pdf->writeHTML($content);
    $html2pdf->output('example00.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
