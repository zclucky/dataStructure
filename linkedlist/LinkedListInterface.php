<?php
/**
 * User: zc
 * Email: myxxqy@gmail.com
 * DateTime: 2019-10-10 10:25
 */

namespace myxxqy_01;


interface LinkedListInterface
{
    /**
     * 获取单链表长度
     * @return int
     */
    public function getLength():int;

    /**
     * 判断单链表是否为空
     * @return bool
     */
    public function isEmpty():bool ;

    /**
     * 遍历单链表
     * @return array
     */
    public function travel():array ;

    /**
     * 头部插入新的节点
     * @param $data
     * @return SingleLinkedListNode
     */
    public function add($data):SingleLinkedListNode;

    /**
     * 尾部插入新的节点
     * @param $data
     * @return SingleLinkedListNode
     */
    public function append($data):SingleLinkedListNode;

    /**
     * 在指定位置插入新的节点
     * @param $pos
     * @param $data
     * @return SingleLinkedListNode
     */
    public function insert($pos, $data):SingleLinkedListNode;

    /**
     * 删除某个节点
     * @param $data
     * @return bool
     */
    public function delete($data):bool ;

    /**
     * 查看某个元素是否存在
     * @param $data
     * @return bool
     */
    public function exists($data):bool ;
}