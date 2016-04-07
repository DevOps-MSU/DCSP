<?php

// Class for Post table and its methods
class Post {
    private $id;
    private $poster;
    private $thread;
    private $content;
    private $timestamp;

    public function __construct($id, $poster, $thread, $content, $timestamp) {
        $this->id = $id;
        $this->poster = $poster;
        $this->thread = $thread;
        $this->content = $content;
        $this->timestamp = $timestamp;
    }

    public function getID() { return $this->id; }
    public function getPoster() { return $this->poster; }
    public function getThread() { return $this->thread; }
    public function getContent() { return $this->content; }
    public function getTimestamp() { return $this->timestamp; }

    public static function post($posterID, $threadID, $content) {
        global $db;

        if(!is_numeric($threadID)) {
            throw new Exception('Invalid thread id');
        }
        $content = htmlspecialchars($content);

        $query = $db->prepare("INSERT INTO `dcsp-ex-posts` (`posterID`, `threadID`, `content`) VALUES (?, ?, ?);");
        $query->execute(array($posterID, $threadID, $content));

        return true;
    }

}