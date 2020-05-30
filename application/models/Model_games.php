<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_games extends CI_Model
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
  public function getgames()
  {
    $games = $this->db->get('game');
    return $games->result_array();  //ログインチーム登録選手全て表示   
  }
  public function getgamecount()
  {
    $game = $this->db->count_all('game');
    return $game;  //試合数   
  }
}