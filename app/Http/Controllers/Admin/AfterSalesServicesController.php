<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\AfterSalesServicesDataTable;
use App\Http\Requests\AfterSalesServiceFormRequest;
use App\Models\AfterSalesService;
use Carbon\Carbon;

class AfterSalesServicesController extends AdminController
{
    protected static $model = AfterSalesService::class;
    protected static $requestClass = AfterSalesServiceFormRequest::class;
    protected static $dataTableClass = AfterSalesServicesDataTable::class;

    public function export($pk, $format = 'xlsx')
    {
        set_time_limit(60);
        $formats = [
            'xlsx' => 'Excel2007',
            'xls' => 'Excel5',
            'odt' => 'OpenDocument',
            'pdf' => 'PDF',
        ];
        $filename = public_path("files/after-sales-services/$pk.$format");

        $afterSalesService = AfterSalesService::findOrFail($pk);
        $phpExcelReader = \PHPExcel_IOFactory::load(public_path(setting('after-sales-services.template')));
        $worksheet = $phpExcelReader->setActiveSheetIndex(0);

        $replace = [];

        foreach ($afterSalesService->toArray() as $key => $value) {
            switch ($key) {
                case 'created_at':
                case 'updated_at':
                    $replace["[$key]"] = Carbon::parse($value)->format('d/m/Y');
                    break;

                default:
                    $replace["[$key]"] = $value;
            }
        }

        foreach (setting('after-sales-services.cells') as $coordinate => $attribute) {
            $value = str_replace(array_keys($replace), $replace, $attribute);
            $currentValue = $worksheet->getCell($coordinate)->getValue();
            $value = !empty($currentValue) ? $currentValue . ' ' . $value : $value;
            $worksheet->setCellValue($coordinate, $value);
        }

        if ($format === 'pdf') {
            /**
             * https://github.com/PHPOffice/PHPExcel/issues/958#issuecomment-331838435
             */
            \PHPExcel_Settings::setPdfRenderer(\PHPExcel_Settings::PDF_RENDERER_DOMPDF, base_path());
        }

        $phpExcelWriter = \PHPExcel_IOFactory::createWriter($phpExcelReader, $formats[$format]);
        $phpExcelWriter->save($filename);
        return response()->download($filename)->deleteFileAfterSend(true);
    }
}