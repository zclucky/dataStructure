<?php
/**
 * User: zc
 * Email: myxxqy@gmail.com
 * DateTime: 2019-10-10 10:22
 */

namespace myxxqy_01;

/**
 * 单向循环链表
 * Class SingleLoopLinkedList
 * @package myxxqy_01
 */
class SingleLoopLinkedList implements LinkedListInterface
{
    /**
     * 链表头节点
     * @var null
     */
    private $head;


    /**
     * 链表长度
     * @var int
     */
    private $length;

    public function __construct()
    {
        $this->head = null;
        $this->length = 0;
    }

    /**
     * 链表长度
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * 链表是否为空
     * @return bool
     */
    public function isEmpty(): bool
    {
        return is_null($this->head);
    }

    /**
     * 遍历链表
     * @return array
     */
    public function travel(): array
    {
        $tmp = [];
        $cur = $this->head;
        if (!$this->isEmpty()) {
            while ($cur->next != $this->head) {
                $tmp[] = $cur->data;
                $cur = $cur->next;
            }
            $tmp[] = $cur->data;
        }
        return $tmp;
    }

    /**
     * 链表头部添加元素
     * @param $data
     * @return SingleLinkedListNode
     */
    public function add($data): SingleLinkedListNode
    {
        $newNode = new SingleLinkedListNode($data);
        if ($this->isEmpty()) {
            $this->head = $newNode;
            $newNode->next = $this->head;
        } else {
            // 1. 待插入节点的下一个节点指向头部
            $newNode->next = $this->head;
            // 2. 获取到链表原本的尾节点
            $cur = $this->head;
            while ($cur->next != $this->head) {
                $cur = $cur->next;
            }
            // 3. 尾节点的下一个节点指向待插入节点
            $cur->next = $newNode;

            // 4. 头节点指向待插入节点
            $this->head = $newNode;
        }
        $this->length++;
        return $newNode;
    }

    /**
     * 链表尾部添加元素
     * @param $data
     * @return SingleLinkedListNode
     */
    public function append($data): SingleLinkedListNode
    {
        $newNode = new SingleLinkedListNode($data);
        if ($this->isEmpty()) {
            $this->head = $newNode;
            $newNode->next = $this->head;
        } else {
            // 拿到尾节点
            $cur = $this->head;
            while ($cur->next != $this->head) {
                $cur = $cur->next;
            }
            // 尾节点的下一个节点指向待插入节点
            $cur->next = $newNode;
            // 待插入节点的下一个节点指向头节点
            $newNode->next = $this->head;
        }
        $this->length++;
        return $newNode;
    }

    /**
     * 在指定位置添加元素
     * @param $pos
     * @param $data
     * @return SingleLinkedListNode
     */
    public function insert($pos, $data): SingleLinkedListNode
    {
        // 头部插入
        if ($pos <= 0) {
            return $this->add($data);
        }

        // 尾部插入
        if ($pos > $this->length) {
            return $this->append($data);
        }

        // 中间插入
        $newNode = new SingleLinkedListNode($data);
        $count = 0;
        $pre = $this->head;
        while ($count < ($pos - 1)) {
            $pre = $pre->next;
            $count++;
        }
        $newNode->next = $pre->next;
        $pre->next = $newNode;
        $this->length++;
        return $newNode;
    }

    /**
     * 删除链表某个元素
     * @param $data
     * @return bool
     */
    public function delete($data): bool
    {
        if ($this->isEmpty()) {
            return false;
        }

        // 需要删除的元素
        $cur = $this->head;
        // 上一个元素
        $pre = null;

        // 三种情况  删除头部 中间 尾部
        // 头部
        if ($cur->data == $data) {
            //判断是否是单节点
            if ($cur->next == $this->head) {
                $this->head = null;
                $this->length = 0;
                return true;
            }
            while ($cur->next != $this->head) {
                $cur = $cur->next;
            }
            $cur->next = $this->head->next;
            $this->head = $this->head->next;
            $this->length--;
            return true;
        }

        // 中间
        $pre = $this->head;
        while ($cur->next != $this->head) {
            if ($cur->data == $data) {
                $pre->next = $cur->next;
                $this->length--;
                return true;
            }
            $pre = $cur;
            $cur = $cur->next;
        }

        //尾部
        if ($cur->data == $data) {
            $pre->next = $cur->next;
            $this->length--;
            return true;
        }

        return false;
    }

    /**
     * 链表中是否有该元素
     * @param $data
     * @return bool
     */
    public function exists($data): bool
    {
        if ($this->isEmpty()) {
            return false;
        }
        $cur = $this->head;
        while ($cur->next != $this->head) {
            if ($cur->data == $data) {
                return true;
            }
            $cur = $cur->next;
        }
        if ($cur->data == $data) {
            return true;
        }
        return false;
    }
}