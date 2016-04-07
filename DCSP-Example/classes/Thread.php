<?php

// Class for Thread table.
class Thread
{
    private $id;
    private $poster;
    private $title;
    private $timestamp;
    private $posts;

    // Given a thread ID, get the data for that thread
    public function __construct($id) {
        global $db;

        // ID must be numeric. If not, possible attack
        if(!is_numeric($id)) {
            throw new Exception('invalidID');
        }

        $query = $db->prepare("SELECT `dcsp-ex-threads`.`title`, `dcsp-ex-threads`.`timestamp`, `dcsp-ex-users`.`username` FROM `dcsp-ex-threads`, `dcsp-ex-users` WHERE `dcsp-ex-threads`.`id` = ? AND `dcsp-ex-threads`.`poster` = `dcsp-ex-users`.`id`;");
        $query->execute(array($id));

        if($query->rowCount() !== 1) {
            throw new Exception('invalidThread');
        }

        $thread = $query->fetch(PDO::FETCH_ASSOC);

        $this->id = $id;
        $this->poster = $thread['username'];
        $this->title = $thread['title'];
        $this->timestamp = $thread['timestamp'];

        // Get all posts for this thread
        $this->posts = array();

        $query = $db->prepare("SELECT `dcsp-ex-posts`.`id`, `dcsp-ex-posts`.`content`, `dcsp-ex-posts`.`timestamp`, `dcsp-ex-users`.`username` FROM `dcsp-ex-posts`, `dcsp-ex-users` WHERE `dcsp-ex-posts`.`threadID` = ? AND `dcsp-ex-posts`.`posterID` = `dcsp-ex-users`.`id` ORDER BY `dcsp-ex-posts`.`timestamp` ASC;");
        $query->execute(array($id));

        foreach($query->fetchAll(PDO::FETCH_ASSOC) as $post) {
            $this->posts[] = new Post($post['id'], $post['username'], $id, $post['content'], $post['timestamp']);
        }
    }

    public function getID() { return $this->id; }
    public function getPoster() { return $this->poster; }
    public function getTitle() { return $this->title; }
    public function getTimestamp() { return $this->timestamp; }
    public function getPosts() { return $this->posts; }

    // Either get all existing theads or all threads by a certain person
    public static function getAllThreads($id = null) {
        global $db;

        // Get all threads
        if($id === null) {
            $threads = array();
            $query = $db->prepare("SELECT `dcsp-ex-threads`.`id`, `dcsp-ex-users`.`username`, `dcsp-ex-threads`.`title` FROM `dcsp-ex-threads`, `dcsp-ex-users` WHERE `dcsp-ex-threads`.`poster` = `dcsp-ex-users`.`id`;");
            $query->execute();
            $threads = $query->fetchAll(PDO::FETCH_ASSOC);

            // Get # of posts in each thread
            $postCount = array();
            $query = $db->prepare("SELECT `threadID` FROM `dcsp-ex-posts`;");
            $query->execute();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $post) {
                if(!isset($postCount[$post['threadID']])) {
                   $postCount[$post['threadID']] = 0;
                }
                $postCount[$post['threadID']]++;
            }

            return array('threads' => $threads, 'postCount' => $postCount);
        } else {
            // Get all threads for a single person

            $query = $db->prepare("SELECT `id`, `title` FROM `dcsp-ex-threads` WHERE `poster` = ?;");
            $query->execute(array($id));
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    // Delete thread from database
    public static function delete($id, $user) {
        global $db;

        $query = $db->prepare("DELETE FROM `dcsp-ex-threads` WHERE `id` = ? AND `poster` = ?;");
        $query->execute(array($id, $user));

        return;
    }

}