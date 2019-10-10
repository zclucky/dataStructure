<?php
/**
 * User: zc
 * Email: myxxqy@gmail.com
 * DateTime: 2019-10-09 14:25
 */

namespace myxxqy_01;

/**
 * 单链表
 * Class SingleLinkedList
 * @package myxxqy_01
 */
class SingleLinkedList implements LinkedListInterface
{
    /**
     * 单链表头节点
     * @var SingleLinkedListNode
     */
    private $head;

    /**
     * 单链表长度
     * @var
     */
    private $length;


    /**
     * 初始化单链表
     * SingleLinkedList constructor.
     */
    public function __construct()
    {
        $this->head = null;
        $this->length = 0;
    }


    /**
     * 获取单链表长度
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * 判断单链表是否为空
     * @return bool
     */
    public function isEmpty(): bool
    {
        return is_null($this->head);
    }

    /**
     * 遍历单链表
     * @return array
     */
    public function travel(): array
    {
        $tmp = [];
        $cur = $this->head;
        while (!is_null($cur)) {
            $tmp[] = $cur->data;
            $cur = $cur->next;
        }
        return $tmp;
    }

    /**
     * 头部插入新的节点
     * @param $data
     * @return SingleLinkedListNode
     */
    public function add($data): SingleLinkedListNode
    {
        $newNode = new SingleLinkedListNode($data);
        $newNode->next = $this->head;
        $this->head = $newNode;
        $this->length++;
        return $newNode;
    }

    /**
     * 尾部插入新的节点
     * @param $data
     * @return SingleLinkedListNode
     */
    public function append($data): SingleLinkedListNode
    {
        $newNode = new SingleLinkedListNode($data);
        if ($this->isEmpty()) {
            $this->head = $newNode;
        } else {
            $cur = $this->head;
            while (!is_null($cur->next)) {
                $cur = $cur->next;
            }
            $cur->next = $newNode;
        }
        $this->length++;
        return $newNode;
    }

    /**
     * 在指定位置插入新的节点
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
            $count++;
            $pre = $pre->next;
        }
        $newNode->next = $pre->next;
        $pre->next = $newNode;
        $this->length++;
        return $newNode;

    }

    /**
     * 删除某个节点
     * @param $data
     * @return bool
     */
    public function delete($data): bool
    {
        $cur = $this->head;
        $pre = null;
        while (!is_null($cur->next)) {
            if ($cur->data == $data) {
                //如果是头部
                if ($cur == $this->head) {
                    $this->head = $cur->next;
                } else {
                    $pre->next = $cur->next;
                }
                $this->length--;
                return true;
            } else {
                $pre = $cur;
                $cur = $cur->next;
            }
        }
        return false;
    }

    /**
     * 查看某个元素是否存在
     * @param $data
     * @return bool
     */
    public function exists($data): bool
    {
        $cur = $this->head;
        while (!is_null($cur)) {
            if ($cur->data == $data) {
                return true;
            }
            $cur = $cur->next;
        }
        return false;
    }
}