<?php

interface Timer
{
    /**
     * 获取下一次执行的时间
     * @return mixed
     */
    function getNextTime();

    /**
     * 检查当前是否计时器是否达到指定时间
     * @return mixed
     */
    function check();

    /**
     * 获取计时器的有关信息
     * @return mixed
     */
    function getInfo();

    /**
     * 跳过下一个执行
     * @return mixed
     */
    function skipOnce();

    /**
     * 终止整个计时器的执行
     * @return mixed
     */
    function stop();
}