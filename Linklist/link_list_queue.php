<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/27 16:42
 * Module: link_list_queue.php
 */
require 'LinkListQueue.php';

$stack = new LinkListQueue();
$stack->push(1);
$stack->push(3);
$stack->push(6);
$stack->push(9);

print_r($stack->pop());
print_r($stack->head);
print_r($stack->checkHead());
print_r($stack->checkEnd());
print_r($stack->toString());