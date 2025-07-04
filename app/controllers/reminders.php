<?php

class Reminders extends Controller {
    public function index() {
              $R = $this->model('Reminder');
              $list_of_reminders = $R->get_all_reminders();
              $this->view('reminders/index', ['reminders' => $list_of_reminders]);

          }
    public function create() {
        $this->view('reminders/create');
    }
    public function store() {
        $text = trim($_REQUEST['reminder'] ?? '');
        if ($text !== '') {
            $R = $this->model('Reminder');
            $R->create_reminder($text);
        }
        header('Location: /reminders');
    }
    public function edit($id) {
        $R = $this->model('Reminder');
        $reminder = $R->get_reminder($id);
        $this->view('reminders/edit', ['reminder' => $reminder]);
    }
    public function update($id) {
        $text = trim($_REQUEST['reminder'] ?? '');
        $complete = isset($_REQUEST['complete']) ? 1 : 0;
        $R = $this->model('Reminder');
        $R->update_reminder($id, $text, $complete);
        header('Location: /reminders');
    }
    public function delete(){
        
    }
}