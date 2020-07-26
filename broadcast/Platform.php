<?php


namespace practice\broadcast\Platform;


use SplSubject;

class Platform implements \SplObserver
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }


    public function update(SplSubject $subject)
    {
        echo $this->name . '已收到商品發佈通知' . PHP_EOL;
    }
}