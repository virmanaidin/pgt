<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $user = [
        [
            "nama" => "virman aidin",
            "alamat" => "Kraksaan",
            "email" => "virmanaidin46@gmail.com"
        ],
        [
            "nama" => "Faizza Maulida",
            "alamat" => "Kraksaan",
            "email" => "faizzamaulida07@gmail.com"
        ],
    ];

        public function getAllUser()
        {
            return $this->user;
        }
}
