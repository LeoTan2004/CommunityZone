<?php
/**
 * 计时器,其中不但包括普通的计时,也包括一些复杂的,比如日期重复规则等.
 */
const MINUT = 60;
const HOUR = 60 * MINUT;
const DAY = 24 * HOUR;
const WEEK = 7*DAY;
class CycleTimer implements Timer
{

    //有特殊的重复时间规则可以通过组合的方式实现
    private int $deadline;//截止时间
    private int $beginTime;//目标时间,如果是普通计时,就是截止时间,这个是可变的,也就是下一次发生事件的事件
    private int $cycleTime;//重复间隔时间

    public function __construct(int $deadline,? int $cycleTime, ?int $beginTime)
    {
        $this->cycleTime = $cycleTime;
        $this->deadline = $deadline;
        $this->beginTime = $beginTime;
    }

    function getNextTime()
    {

    }

    function check()
    {
        // TODO: Implement check() method.
    }

    function getInfo()
    {
        // TODO: Implement getInfo() method.
    }

    function skipOnce()
    {
        // TODO: Implement skipOnce() method.
    }

    function stop()
    {
        // TODO: Implement stop() method.
    }
}