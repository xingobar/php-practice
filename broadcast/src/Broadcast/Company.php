<?php

namespace Broadcast;

use SplObserver;

class Company implements \SplSubject
{
    private $observers = [];

    public function attach(SplObserver $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer)
    {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify()
    {
        foreach($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
