<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/27 16:42
 * Module: LinkListQueue.php
 * 链表实现队列
 */
require 'Linklist.php';

class LinkListQueue extends Linklist
{
    public $tail;    //尾节点

    /**
     * push
     *
     * @param $value
     */
    public function push($value)
    {

        if ($this->head->val == null) {
            $this->tail = new Node($value);
            $this->head = $this->tail;
        } else {
            $this->tail->next = new Node($value);
            $this->tail       = $this->tail->next;
        }
        $this->size++;
    }

    /**
     * pop
     * @return null
     * @throws \Exception
     */
    public function pop()
    {
        if ($this->size <= 0)
            throw new \Exception('超过链表范围');
        $val        = $this->head->val;
        $this->head = $this->head->next;

        $this->size--;
        return $val;
    }

    /**
     * 查看队首
     */
    public function checkHead()
    {
        return $this->head->val;
    }

    /**
     * 查看队尾
     */
    public function checkEnd()
    {
        return $this->tail->val;
    }

    /**
     * toString
     */
    public function toString()
    {
        $r = [];
        while ($this->head) {
            $r[]        = $this->head->val;
            $this->head = $this->head->next;
        }
        return implode('->', $r);
    }
}