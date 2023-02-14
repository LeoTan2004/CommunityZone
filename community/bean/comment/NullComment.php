<?php

namespace bean\comment;

use bean\NullEntity;

class NullComment implements CommentBean,NullEntity
{

    public function getMID(): int
    {
        return -1;
    }

    public function getMTime(): \DateTime
    {
        return new DateTime("1949/10/1");;
    }

    public function getMUserID(): int
    {
        return -1;
    }

    public function getMTheme(): string
    {
        return "";
    }

    public function getMContent(): string
    {
        return "";
    }

    public function getMRid(): int
    {
        return -1;
    }

    public function getStatus(): int
    {
        return 1;
    }
}