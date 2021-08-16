<?php


namespace Source\Core;


class Controller
{
    /** @var Message */
    protected $message;

    public function __construct()
    {
        $this->message = new Message();
    }

}