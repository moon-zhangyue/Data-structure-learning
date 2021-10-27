<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/27 15:36
 * Module: Node.php
 * 定义节点类
 */

class Node
{
    public $val;
    public $next;

    public function __construct($val = null, $next = null)
    {
        $this->val  = $val;
        $this->next = $next;
    }
}