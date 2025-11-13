<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/sistema.php';

use Spipu\Html2Pdf\Html2Pdf;
use PhpOffice\PhpSpreadsheet\Reader\Html;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Layout;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;

class Reportes extends Sistema{

    var $content = "";

    function __construct(){
        $this -> content = ob_get_clean();
    }
    
    function InstitucionesInvestigadores(){
        
        $investitucion = new Institucion();
        $data = $investitucion -> reporteInstituciones();
        $totalInstituciones = 0;
        foreach ($data as $row) {
            $totalInstituciones += $row['Numero_Investigadores'];
        }
        $html2pdf = new Html2Pdf('P', 'Letter', 'es');
        $this->content = "
        <style>
            body {
                font-family: 'Helvetica', 'Arial', sans-serif;
                font-size: 12pt;
                color: #333333;
            }

            .table-container {
                width: 90%;
                margin: 20px 0px 0px 22%;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
                box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.15);
            }

            th {
                background-color: #004080;
                color: white;
                font-weight: bold;
                text-align: center;
                padding: 10px;
                border: 1px solid #ccc;
            }

            td {
                padding: 8px;
                border: 1px solid #ccc;
                text-align: left;
            }

            tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            tr:hover {
                background-color: #e6f0ff;
            }
        </style>

        <div style='text-align: center;'>
            <h1 style='font-size: 18pt; color: #077033;'>Instituciones y su Número de Investigadores</h1>
            <img src='../images/logos/logo.png' width='200'/>
        </div>

        <div class='table-container'>
            <table>
                <thead>
                    <tr>
                        <th>Institución</th>
                        <th>Número de Investigadores</th>
                        <th>Porcentaje (%)</th>
                    </tr>
                </thead>
                <tbody>
        ";

        foreach ($data as $row) {
            $this->content .= "
                    <tr>
                        <td>{$row['Institución']}</td>
                        <td style='text-align: center;'>{$row['Numero_Investigadores']}</td>
                        <td>" . (($row['Numero_Investigadores'] / $totalInstituciones) * 100) . " %</td>
                    </tr>
            ";
        }

        $this->content .= "
                </tbody>
            </table>
        </div>
        ";

        $html2pdf->writeHTML($this -> content);
        $html2pdf->output('Reporte_Instituciones.pdf');
    }

    function ExcelInstitucionesInvestigadores(){

        $institucion = new Institucion();
        $data = $institucion->reporteInstituciones();
        $totalInstituciones = 0;

        foreach ($data as $row) {
            $totalInstituciones += $row['Numero_Investigadores'];
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Encabezados
        $sheet->setCellValue('A1', 'Institución');
        $sheet->setCellValue('B1', 'Número de Investigadores');
        $sheet->setCellValue('C1', 'Porcentaje (%)');

        // Insertar datos
        $rowNum = 2;
        foreach ($data as $row) {
            $sheet->setCellValue("A{$rowNum}", $row['Institución']);
            $sheet->setCellValue("B{$rowNum}", $row['Numero_Investigadores']);
            $porcentaje = ($row['Numero_Investigadores'] / $totalInstituciones) * 100;
            $sheet->setCellValue("C{$rowNum}", round($porcentaje, 2));
            $rowNum++;
        }

       

        // Crear gráfico (ejemplo: pastel)
        $labels = [new DataSeriesValues('String', 'Worksheet!$A$2:$A$' . ($rowNum - 1), null, count($data))];
        $values = [new DataSeriesValues('Number', 'Worksheet!$C$2:$C$' . ($rowNum - 1), null, count($data))];

        $series = new DataSeries(
            DataSeries::TYPE_PIECHART,
            null,
            range(0, count($values) - 1),
            [],
            $labels,
            $values
        );

        $layout = new Layout();
        $layout->setShowVal(false);
        $layout->setShowPercent(true);

        $plotArea = new PlotArea($layout, [$series]);
        $legend = new Legend(Legend::POSITION_RIGHT, null, false);
        $title = new Title('Distribución de Investigadores por Institución');

        $chart = new Chart(
            'grafica1',
            $title,
            $legend,
            $plotArea,
            true,
            0,
            null,
            null
        );

        // Posición del gráfico en el Excel
        $chart->setTopLeftPosition('E2');
        $chart->setBottomRightPosition('L20');

        $sheet->addChart($chart);

        // Enviar al navegador
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="reporte_instituciones.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->setIncludeCharts(true); // IMPORTANTE
        $writer->save('php://output');
    }
}

?>