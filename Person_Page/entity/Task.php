<?php

/**
 * 任务,一般用来记录代办时间以及一些需要自动完成的事件
 */
class Task
{
    private int $tid;//任务的唯一标识符
    private string $name;//任务名称
    private string $create_time;//创建时间
    private string $deadline;//截止时间
    private string $recycle;//重复规则


    /**
     * @return string
     */
    public function getName(): string
    {

        return $this->name;
    }
}