<?php

namespace App\Lib;

class MsgContent
{
    public $name, $email, $phone, $content;

    /**
     * @param $name
     * @param $email
     * @param $phone
     * @param $content
     */
    public function __construct($name, $email, $phone, $content)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->content = $content;
    }


}
