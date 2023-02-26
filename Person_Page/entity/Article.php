<?php

class Article
{
    private string $title;//文章标题
    private string $author;//作者签名
    private string $create_time;//创建时间
    private string $last_time;//上一次修改时间
    private string $content;//内容
    private int $rank;//文章等级|文章重要程度
    private string $description;//基本描述|文章标签
    private string $attribute;//附属属性,使用JSON编码后持续化存放
}