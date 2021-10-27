<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/27 11:15
 * Module: SplStack.php
 * PHP 标准库SplStack 栈
 */
/*
栈有什么特点
栈遵循先进后出的原则 (LIFO)。这意味着栈只有一个出口用来压入元素和弹出元素，当我们执行压入或者弹出操作的时候要注意栈是否已满或者栈是否是空的。

栈的方法
push
pop
top
bottom
isEmpty
offsetSet
offsetGet
offsetExists
offsetUnset
 * */


header("Content-type:text/html; charset=utf-8");

$stack = new SplStack();

//LIFO
echo 'stack push', PHP_EOL;

//入栈
$stack->push('hello');
$stack->push('world');
$stack->push('PHP');

//数字式入栈 SplStack 实现了 ArrayAccess 接口,所以 SplStack 类具有数组的特性
$stack[] = 'site';
$stack[] = 'develop';

echo '***************', PHP_EOL;

//设置index为 0 的元素（栈顶）的值为 DEVLOP，遍历栈
$stack->offsetSet(0, 'DEVLOP');

foreach ($stack as $val) {
    echo $val . PHP_EOL;
}

echo '***************', PHP_EOL;

//查看栈元素个数
echo '栈内有', $stack->count(), '个元素', PHP_EOL;
echo '栈内有', count($stack), '个元素', PHP_EOL;

echo '***************', PHP_EOL;
//查看栈顶、栈底元素
echo '栈顶元素是', $stack->top(), PHP_EOL;
echo '栈底元素是', $stack->bottom(), PHP_EOL;

echo '***************', PHP_EOL;
//遍历栈
foreach ($stack as $val) {
    echo $val, PHP_EOL;
}

echo '***************', PHP_EOL;
// 双向链表的rewind和堆栈的rewind相反，
// 堆栈的rewind使得当前指针指向Top所在的位置，而双向链表调用之后指向Bottom所在位置。
$stack->rewind();
echo 'Current：' . $stack->current() . "\r\n";

// 堆栈的next操作使指针指向靠近Bottom位置的下一个节点，
// 而双向链表是靠近Top的下一个节点。
// next操作不会删除元素
$stack->next();
echo 'Current：' . $stack->current() . "\r\n";

// 遍历堆栈
$stack->rewind();
while ($stack->valid()) {
    echo $stack->key() . '=>' . $stack->current() . "\r\n";
    $stack->next();
}

echo '***************', PHP_EOL;

//出栈
while ($stack->count() != 0) {
    echo '栈顶元素是:', $stack->top(), PHP_EOL;
    $stack->pop();
}
