<?php
/**
 * User: zc
 * Email: myxxqy@gmail.com
 * DateTime: 2019-10-09 14:53
 */

namespace myxxqy_01;
require_once "../vendor/autoload.php";


// 单链表测试
$link = new SingleLinkedList();
$link->append("b");
$link->append("c");
$link->insert(1,"d");
//echo $link->getLength();
var_dump($link->delete("d"));c
//var_dump($link->exists("a"));
var_dump($link->exists("b"));
var_dump($link->travel());
var_dump($link->getLength());

// 单向循环链表测试
//$link = new SingleLoopLinkedList();
////$link->add('a');
////$link->add('b');
////$link->add("c");
//$link->append('d');
//$link->append('e');
//$link->append('1');
//$link->append('2');
//$link->append('3');
//$link->append("f");
////$link->insert(1,'aa');
////$link->insert(5,'bb');
//var_dump($link->delete("2"));
//var_dump($link->delete("f"));
//var_dump($link->exists("e"));
//var_dump($link->travel());
//var_dump($link->getLength());