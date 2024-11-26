<?php
require_once 'Observer.php';

class EmailNotifierObserver implements Observer
{
    public function update($eventData)
    {
        echo "[EmailNotifier] Email sent for event: $eventData\n";
    }
}
