<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/27 16:04
 * Module: output_linklist.php
 */

require './Linklist.php';

$node = new Linklist();
$node->addFirst(1);
$node->add(1, 7);
$node->add(2, 10);
$node->edit(1, 8);
var_dump($node->select(1));
$node->delete(1);
$node->addLast(99);
var_dump($node->iscontain(2));
var_dump($node);
var_dump($node->tostring());

//增： O(n)  只对链表头操作：O(1)
//删： O(n)  只对链表头操作：O(1)
//改：O(n)
//查：O(n)   只对链表头操作：O(1)