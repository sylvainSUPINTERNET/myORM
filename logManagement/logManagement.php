<?php


interface logManagement
{
    public function logMessage($stmt,$timeRequest);
    public function logError($stmt,$timeRequest,$errorMessage);
}