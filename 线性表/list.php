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