<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 5/06/2015
 * Time: 16:59
 */

namespace BLL;

class DataController
{

    public function GetReport($data)
    {
        // uses a stored procedure that gets Selected Ids
        // save each object at index object Id => makes it easier to search by id
        $array = $data->{'questionId'};
        $fId = $data->{'functionId'};
        $context = new \DAL\InterviewContext();
        $pdf = new \BLL\CreatePdf($context, new \BLL\PDF());
        $pdf->ParseData($array, $fId);
        $pdf->GetData();
        $pdf->BuildPdf();
        $pdf->OutputToDownloadLater();
        echo $pdf->getName();

    }
}