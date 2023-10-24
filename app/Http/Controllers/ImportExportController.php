<?php

namespace App\Http\Controllers;

use App\Exports\ExportPatients;
use Illuminate\Http\Request;
use App\Exports\ExportUsers;
use Maatwebsite\Excel\Facades\Excel;
class ImportExportController extends Controller
{

    public function export()
    {
        return Excel::download(new ExportUsers, 'users.xlsx');
    }

    public function export_patient()
    {
        return Excel::download(new ExportPatients, 'patients.xlsx');
    }
}
