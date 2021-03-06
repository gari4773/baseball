<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_game extends CI_Model
{
  public function add_game($day)
  {
    //add_playersのモデルの実行時に、以下のデータを取得して、$dataと紐づける
    $data = [
      "team_id" => $this->input->post("team_id"),
      "battle_team" => $this->input->post("battle_team"),
      "score" => $this->input->post("score"),
      "loss" => $this->input->post("loss"),
      "battle" => $this->input->post("battle"),
      "consideration" => $this->input->post("consideration"),
      "insert_time" => $day
    ];
    $data = $this->security->xss_clean($data);
    //$dataをDB内のplayerに挿入後に、$queryと紐づける
    $query = $this->db->insert("game", $data);
    if ($query) {
      return true;
    } else {
      return false;
    }
  }
}