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
    // helper class to manage data retrieval, generate a pdf and do cleanup of files.

    public function getReport($data)
    {
        // clean up old files first
        $this->deleteOldTempFiles();

        // uses a stored procedure that gets Selected Ids
        // save each object at index object Id => makes it easier to search by id
        $array = $data->{'questionId'};
        $fId = $data->{'functionId'};
        $context = new \DAL\InterviewContext();
        $pdf = new \BLL\CreatePdf($context, new \BLL\PDF());
        $pdf->parseData($array, $fId);
        $pdf->getData();
        $pdf->buildPdf();
        $pdf->outputToDownloadLater();
        return $pdf->getName();
    }

    public function deleteOldTempFiles()
    {
        $x = 60; //1 minute

        $current_time = time();

        $files = array();

        if (sizeof(scandir('../temp/')) === 0) {
            return;
        }

        foreach (scandir('../temp/') as $file) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;

            $files[] = $file;
        }

        foreach ($files as $file) {

            $file_creation_time = filemtime('../temp/' . $file);
            $difference = $current_time - $file_creation_time;

            if ($difference >= $x) {
                unlink('../temp/' . $file);
            }
        }
    }
}