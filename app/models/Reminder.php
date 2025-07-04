<?php

class Reminder {

    public function __construct() {

    }

    public function get_all_reminders(): array {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM reminders;");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function get_reminder($id): array|false {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM reminders WHERE id = :id;");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
     public function create_reminder($text): int{
         
     }
    
    public function update_reminder($reminder_id): int {
        $db = db_connect();
        //do update statement
        $statement = $db->prepare("update reminders set complete = 1 where id = :id;");
        $statement->bindValue(':id', $reminder_id);
        $statement->execute();
        return $statement->rowCount();
    }
     public function delete_reminder($reminder_id): int{
         
     }
}

?>