<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/27 15:35
 * Module: Linklist.php
 * 链表是一种物理存储单元上非连续、非顺序的存储结构，数据元素的逻辑顺序是通过链表中的指针链接次序实现的。链表由一系列结点（链表中每一个元素称为结点）组成，结点可以在运行时动态生成。
 */
require './Node.php';

class Linklist
{
    public $head;           //头节点(默认一个虚拟头节点)
    public $size;           //长度

    public function __construct()
    {
        $this->head = new Node();
        $this->size = 0;
    }

//头插法
    public function addFirst($value)
    {
//        $node = new Node($value);
//        $node->next = $this->head;
//        $this->head = $node;

        //简化
//        $this->head = new Node( $value, $this->head );
//        $this->size++;

        $this->add(0, $value);
    }

    /**指定索引位置插入
     *
     * @param $index
     * @param $value
     *
     * @throws Exception
     */
    public function add($index, $value)
    {

        if ($index > $this->size)
            throw new Exception('超过链表范围');

//        if( $index==0 ){
//            $this->addFirst($value);
//        }else{
        $prev = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }

//            $node = new Node($value);
//            $node->next = $prev->next;
//            $prev->next = $node;

        $prev->next = new Node($value, $prev->next);
//        }

        $this->size++;
    }

    /**
     * 尾插法
     *
     * @param $value
     */
    public function addLast($value)
    {
        $this->add($this->size, $value);
    }

    /**
     * 编辑
     *
     * @param $index
     * @param $value
     *
     * @throws Exception
     */
    public function edit($index, $value)
    {
        if ($index > $this->size - 1)
            throw new Exception('超过链表范围');

        $prev = $this->head->next;
        for ($i = 0; $i <= $index; $i++) {
            if ($i == $index)
                $prev->val = $value;
            $prev = $prev->next;
        }
    }

    /**
     * 查询
     *
     * @param $index
     *
     * @return null
     * @throws Exception
     */
    public function select($index)
    {
        if ($index > $this->size - 1)
            throw new Exception('超过链表范围');

        $prev = $this->head->next;
        for ($i = 0; $i <= $index; $i++) {
            if ($i == $index)
                return $prev;
            $prev = $prev->next;
        }
    }


    /**删除
     *
     * @param $index
     *
     * @throws Exceptionr
     */
    public function delete($index)
    {
        if ($index > $this->size - 1)
            throw new Exception('超过链表范围');

        $prev = $this->head;
        for ($i = 0; $i <= $index; $i++) {
            if ($i == $index)
                $prev->next = $prev->next->next;
            $prev = $prev->next;
        }
        $this->size--;
    }

    /**检索值是否存在
     *
     * @param $value
     *
     * @return bool
     */
    public function iscontain($value)
    {
        $prev = $this->head->next;
        while ($prev) {

            if ($prev->val == $value) {
                return true;
            }
            $prev = $prev->next;
        }

        return false;
    }

    /**转换为字符串
     * @return string
     */
    public function tostring()
    {

        $prev = $this->head->next;

        $r = [];
        while ($prev) {
            $r[]  = $prev->val;
            $prev = $prev->next;
        }
        return implode('->', $r);

    }

    /**
     * 删除指定的节点值
     *
     * @param $value
     */
    public function removeFileds($value)
    {
        $prev = $this->head;
        while ($prev->next) {
            if ($prev->val == $value) {
                $prev->val  = $prev->next->val;
                $prev->next = $prev->next->next;
            } else {
                $prev = $prev->next;
            }
        }
    }

    /**
     * 通过递归方式删除指定的节点值
     *
     * @param $value
     */
    public function removeFiledsByRecursion($value)
    {
        $this->head = $this->removeByRecursion($this->head, $value);
        return $this->head;
    }

    public function removeByRecursion($node, $value, $level = 0)
    {
        if ($node->next == null) {
            $this->showDeeep($level, $node->val);
            return $node->val == $value ? $node->next : $node;
        }

        $this->showDeeep($level, $node->val);
        $node->next = $this->removeByRecursion($node->next, $value, ++$level);
        $this->showDeeep($level, $node->val);
        return $node->val == $value ? $node->next : $node;
    }

    /**
     * 显示深度
     * 帮助理解递归执行过程，回调函数执行层序遵循系统栈
     *
     * @param int $level 深度层级
     * @param     $val
     *
     * @return bool
     */
    public function showDeeep($level = 1, $val)
    {
        if ($level < 1) {
            return false;
        }

        while ($level--) {
            echo '-';
        }
        echo "$val\n";
    }
}