<?php
/**
 * User: zc
 * Email: myxxqy@gmail.com
 * DateTime: 2019-10-09 17:12
 */

interface StackInterface
{
    public function top();

    public function pop();

    public function push(string $data);

    public function isEmpty();
}