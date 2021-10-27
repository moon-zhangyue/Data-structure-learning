<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/27 16:37
 * Module: LinklistStack.php
 */
require 'Linklist.php';

class LinklistStack extends Linklist
{
    /**
     * @param $value
     */
    public function push($value)
    {
        $this->addFirst($value);
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        $r = $this->head->next->val;
        $this->delete(0);
        return $r;
    }
}