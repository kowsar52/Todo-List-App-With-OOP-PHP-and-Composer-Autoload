<?php
namespace App\Models;
use App\DB;

class TodoModel{
    
    public function get($status){
        $sql = "SELECT * from `todolists` WHERE `status` != $status ORDER BY id DESC";
        $result = DB::connect()->query($sql);
        $data = array();
        while ($row = $result -> fetch_row()) {
            $data[] = [
                'id' => $row[0],
                'title' => $row[1],
                'status' => $row[2],
            ] ;
          }


        return $data;
    }

    public function insert($data){
        
        $sql = "INSERT INTO `todolists`(`title`, `status`) VALUES ('$data->title', '2')";

        $result = DB::connect()->query($sql);
        return $result;
    }


    public function update($data){
       
          $sql = "UPDATE `todolists` SET `status`= $data->status WHERE `id` = $data->id";
  
        $result = DB::connect()->query($sql);
        return $result;
    }

    public function edit($data){
         $sql = "UPDATE `todolists` SET `title`= '$data->title' WHERE `id` = $data->id";
  
        $result = DB::connect()->query($sql);
        return $result;
    }

    public function delete($data){
        if(isset($data->id)){
            $sql = "DELETE FROM `todolists` WHERE `id` = $data->id";
        }else{
            $sql = "DELETE FROM `todolists` WHERE `status` = 1";

        }
  
        $result = DB::connect()->query($sql);
        return $result;
    }
}