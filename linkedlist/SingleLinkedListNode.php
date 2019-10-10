<?php
/**
 * User: zc
 * Email: myxxqy@gmail.com
 * DateTime: 2019-10-09 14:25
 */

namespace myxxqy_01;

/**
 * 单链表节点
 * Class SingleLinkedListNode
 * @package myxxqy_01
 */
class SingleLinkedListNode
{
    /**
     * 节点中的数据域
     * @var null
     */
    public $data;

    /**
     * 节点中的指针域，指向下一个节点
     * @var SingleLinkedListNode
     */
    public $next;

    /**
     * SingleLinkedListNode constructor.
     * @param null $data
     */
    public function __construct($data = null)
    {
        $this->data = $data;
        $this->next = null;
    }
}