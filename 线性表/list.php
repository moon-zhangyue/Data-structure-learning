<?php

class ListNode
{
    public $data = NULL;
    public $next = NULL;

    public function __construct(string $data = NULL)
    {
        $this->data = $data;
    }
}

class LinkedList
{
    private $_firstNode = NULL;
    private $_totalNode = 0;
    private $_currentNode = NULL;  // 当前节点
    private $_currentPosition = 0; // 当前位置

    public function insert(string $data = NULL)
    {
        $newNode = new ListNode($data);

        if ($this->_firstNode === NULL) {
            $this->_firstNode = &$newNode;
        } else {
            $currentNode = $this->_firstNode;
            while ($currentNode->next !== NULL) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
        $this->_totalNode++;
        return TRUE;
    }

    public function display()
    {
        echo "Total book titles: " . $this->_totalNode . "\n";
        $currentNode = $this->_firstNode;
        while ($currentNode !== NULL) {
            echo $currentNode->data . "\n";
            $currentNode = $currentNode->next;
        }
    }

    //在第一个节点前插入
    public function insertAtFirst(string $data = NULL)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode === NULL) {
            $this->_firstNode = &$newNode;
        } else {
            $currentFirstNode = $this->_firstNode;
            $this->_firstNode = &$newNode;
            $newNode->next    = $currentFirstNode;
        }
        $this->_totalNode++;
        return TRUE;
    }

    //在特殊节点前插入
    public function insertBefore(string $data = NULL, string $query = NULL)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode && $this->_firstNode->data = $query) {
            $newNode->next    = $this->_firstNode;
            $this->_firstNode = &$newNode;
        }

        if ($this->_firstNode !== NULL) {
            $previous    = NULL;
            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {
                    $previous->next = &$newNode;
                    $newNode->next  = $currentNode;
                    $this->_totalNode++;
                    break;
                }
                $previous    = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    //在特定节点后插入
    public function insertAfter(string $data = NULL, string $query = NULL)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode !== NULL) {
            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {
                    $newNode->next     = $currentNode->next;
                    $currentNode->next = &$newNode;
                    $this->_totalNode++;
                    break;
                }
                $currentNode = $currentNode->next;
            }
        }
    }

    //链表的反转
    public function reverse()
    {
        if ($this->_firstNode !== NULL) {
            if ($this->_firstNode->next !== NULL) {
                $reversedList = NULL;
                $next         = NULL;
                $currentNode  = $this->_firstNode;
                while ($currentNode !== NULL) {
                    $next              = $currentNode->next;
                    $currentNode->next = $reversedList;
                    $reversedList      = $currentNode;
                    $currentNode       = $next;
                }
                $this->_firstNode = $reversedList;
            }
        }
    }

    //获取第N个位置元素
    public function getNthNode(int $n = 0)
    {
        $count = 1;
        if ($this->_firstNode !== NULL) {
            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL) {
                if ($count === $n) {
                    return $currentNode;
                }
                $count++;
                $currentNode = $currentNode->next;
            }
        }
    }

    /*
     * 理解链表的算法复杂度
        操作	    时间复杂度:最差	事件复杂度:平均
        在首,尾插入	O(1)	        O(1)
        在首尾删除	O(1)	        O(1)
        搜索	    O(n)	        O(n)
        访问	    O(n)	        O(n)
     * */

    //双向链表  使用 PHP SplDoublyLinkedList

    #pragram make implements Iterator
    public function current()
    {
        return $this->_currentNode->data;
    }

    public function next()
    {
        $this->_currentPosition++;
        $this->_currentNode = $this->_currentNode->next;
    }

    public function key()
    {
        return $this->_currentPosition;
    }

    public function rewind()
    {
        $this->_currentPosition = 0;
        $this->_currentNode     = $this->_firstNode;
    }

    public function valid()
    {
        return $this->_currentNode !== NULL;
    }
}

$linked_list = new LinkedList();

$linked_list->insert(1);
$linked_list->insert(2);
$linked_list->insert(3);
$linked_list->insert(4);

$linked_list->display();

//返回结果:
//Total book titles: 4
//1 2 3 4


//foreach ($BookTitles as $title) {
//    echo $title . "\n";
//}
//for ($BookTitles->rewind(); $BookTitles->valid(); $BookTitles->next()) {
//    echo $BookTitles->current() . "\n";
//}