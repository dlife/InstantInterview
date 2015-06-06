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
        // clean up old files first
        // gives a file not found error when run from index.php
        $this->DeleteOldTempFiles();

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
        return $pdf->getName();
    }

    public function DeleteOldTempFiles()
    {
        $x = 60; //1 hour

        $current_time = time();

        $files = array();

        if (sizeof(scandir('../web/tempData/')) === 0) {
            return;
        }

        foreach (scandir('../web/tempData/') as $file) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;

            $files[] = $file;
        }

        foreach ($files as $file) {

            $file_creation_time = filemtime('../web/tempData/' . $file);
            $difference = $current_time - $file_creation_time;

            if ($difference >= $x) {
                unlink('../web/tempData/' . $file);
            }
        }
    }
}