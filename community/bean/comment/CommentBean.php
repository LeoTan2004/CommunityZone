<?php

namespace bean\comment;

use Cassandra\Date;

interface CommentBean
{
    /**
     * @return int
     */
    public function getMID(): int;

    /**
     * @return Date
     */
    public function getMTime(): \DateTime;

    /**
     * @return int
     */
    public function getMUserID(): int;

    /**
     * @return string
     */
    public function getMTheme(): string;

    /**
     * @return string
     */
    public function getMContent(): string;

    /**
     * @return int
     */
    public function getMRid(): int;

    public function getStatus():int;

}