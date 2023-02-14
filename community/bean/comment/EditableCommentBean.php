<?php

namespace bean\comment;

use Cassandra\Date;

interface EditableCommentBean extends CommentBean
{


    /**
     * @param Date $m_Time
     */
    public function setMTime(Date $m_Time): void;

    /**
     * @param int $m_userID
     */
    public function setMUserID(int $m_userID): void;

    /**
     * @param string $m_Theme
     */
    public function setMTheme(string $m_Theme): void;

    /**
     * @param string $m_Content
     */
    public function setMContent(string $m_Content): void;

    /**
     * @param int $m_Rid
     */
    public function setMRid(int $m_Rid): void;

    public function setStatus(int $status);
}