<?php

namespace bean\comment;

use Cassandra\Date;
use globe\TAGS;

class Comment implements EditableCommentBean
{

    /**
     * @param int $m_ID
     * @param Date $m_Time
     * @param int $m_userID
     * @param string $m_Theme
     * @param string $m_Content
     * @param int $m_Rid
     */
    public function __construct( int $m_ID, Date $m_Time, int $m_userID, string $m_Theme, string $m_Content, int $m_Rid)
    {
        $this->m_ID = $m_ID;
        $this->m_Time = $m_Time;
        $this->m_userID = $m_userID;
        $this->m_Theme = $m_Theme;
        $this->m_Content = $m_Content;
        $this->m_Rid = $m_Rid;

    }

    private int $m_ID;
    private Date $m_Time;
    private int $m_userID;
    private string $m_Theme;
    private string $m_Content;
    private int $m_Rid;

    /**
     * @return int
     */
    public function getMID(): int
    {
        return $this->m_ID;
    }

    /**
     * @return Date
     */
    public function getMTime(): \DateTime
    {
        return $this->m_Time;
    }

    /**
     * @param Date $m_Time
     */
    public function setMTime(Date $m_Time): void
    {
        $this->m_Time = $m_Time;
    }

    /**
     * @return int
     */
    public function getMUserID(): int
    {
        return $this->m_userID;
    }

    /**
     * @param int $m_userID
     */
    public function setMUserID(int $m_userID): void
    {
        $this->m_userID = $m_userID;
    }

    /**
     * @return string
     */
    public function getMTheme(): string
    {
        return $this->m_Theme;
    }

    /**
     * @param string $m_Theme
     */
    public function setMTheme(string $m_Theme): void
    {
        $this->m_Theme = $m_Theme;
    }

    /**
     * @return string
     */
    public function getMContent(): string
    {
        return $this->m_Content;
    }

    /**
     * @param string $m_Content
     */
    public function setMContent(string $m_Content): void
    {
        $this->m_Content = $m_Content;
    }

    /**
     * @return int
     */
    public function getMRid(): int
    {
        return $this->m_Rid;
    }

    /**
     * @param int $m_Rid
     */
    public function setMRid(int $m_Rid): void
    {
        $this->m_Rid = $m_Rid;
    }


    public function getStatus(): int
    {
        return $this->m_Rid;
    }

    public function setStatus(int $status)
    {
        $this->m_Rid=$this->status;
    }


}