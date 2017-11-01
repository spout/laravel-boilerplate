<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\AfterSalesServicesDataTable;
use App\Http\Requests\AfterSalesServiceFormRequest;
use App\Models\AfterSalesService;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;

class AfterSalesServicesController extends AdminController
{
    protected static $model = AfterSalesService::class;
    protected static $requestClass = AfterSalesServiceFormRequest::class;
    protected static $dataTableClass = AfterSalesServicesDataTable::class;

    public function export($pk, $format = 'xlsx')
    {
        $filename = public_path("files/after-sales-services/$pk.$format");
        $afterSalesService = AfterSalesService::findOrFail($pk);
        $spreadsheet = IOFactory::load(public_path(setting('after-sales-services.template')));
        $worksheet = $spreadsheet->setActiveSheetIndex(0);
        $worksheet->setShowGridlines(false);

        $replace = [];
        foreach ($afterSalesService->toArray() as $key => $value) {
            switch ($key) {
                case 'created_at':
                case 'updated_at':
                    $replace["[$key]"] = Carbon::parse($value)->format('d/m/Y');
                    break;

                default:
                    $replace["[$key]"] = $value;
                    break;
            }
        }

        foreach (setting('after-sales-services.cells') as $coordinate => $attribute) {
            $value = str_replace(array_keys($replace), $replace, $attribute);
            $currentValue = $worksheet->getCell($coordinate)->getValue();
            $value = !empty($currentValue) ? $currentValue . ' ' . $value : $value;
            $worksheet->setCellValue($coordinate, $value);
        }

        if ($format === 'pdf') {
            IOFactory::registerWriter('Pdf', Dompdf::class);
        }

        $spreadsheetWriter = IOFactory::createWriter($spreadsheet, studly_case($format));
        $spreadsheetWriter->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}