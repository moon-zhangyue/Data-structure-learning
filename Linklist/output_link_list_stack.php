<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/27 16:39
 * Module: output_link_list_stack.php
 */
require 'LinklistStack.php';

$stack = new LinklistStack();
$stack->push(1);
$stack->push(3);
$stack->push(6);
$stack->push(9);

print_r($stack->pop());
print_r($stack->head);