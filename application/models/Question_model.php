<?php
class Question_model extends CI_Model {
    public function get_all() {
        return $this->db->get('questions')->result();
    }
    public function get($id) {
        return $this->db->get_where('questions', ['id' => $id])->row();
    }
    public function insert($question, $answer) {
        $this->db->insert('questions', [
            'question' => $question,
            'answer' => $answer
        ]);
    }
    public function update($id, $question, $answer) {
        $this->db->where('id', $id);
        $this->db->update('questions', [
            'question' => $question,
            'answer' => $answer
        ]);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('questions');
    }
}
