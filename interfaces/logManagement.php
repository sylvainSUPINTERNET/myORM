<?php


interface logManagement
{

//log message / log error
    public function logMessage($stmt,$timeRequest);
    public function logError($stmt,$timeRequest,$errorMessage);
}