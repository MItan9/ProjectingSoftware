<?php
require_once 'Observer.php';

class LoggerObserver implements Observer
{
    public function update($eventData)
    {
        echo "[Logger] Event: $eventData\n";
    }
}
