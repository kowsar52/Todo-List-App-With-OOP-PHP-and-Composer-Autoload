<?php

namespace App\Controllers;
use App\Models\TodoModel;

class TodoController{
    //get all data
    public function getData($request){
      
        $status = $request['status'];
        if($status == 3){

            $all_data = TodoModel::get(3);
        }else{
            $all_data = TodoModel::get($status);
        }
        // print_r($all_data);
 
        echo json_encode($all_data);
    }

    //store method
    public function store($request){

        $title = $_POST['title']; //input data 

        if($title != null){ //empty data is not inserted
            TodoModel::insert(
                (object)[
                    'title' => $title,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),

                ]
            );
        } 


       echo json_encode(['success'=>'Store Successfully']);
    }

    // update todo 
    public function update($request){
        $status = $_POST['status']; //input data 
        $id = $_POST['id']; //input data 

        if($status != null){ //empty data is not inserted
            TodoModel::update(
                (object)[
                    'status' => $status,
                    'id' => $id,

                ]
            );
        } 


       echo json_encode(['success'=>'Updated Successfully']);
    }

    // edit todo 
    public function edit($request){
        $title = $_POST['title']; //input data 
        $id = $_POST['id']; //input data 

        if($title != null){ //empty data is not inserted
            TodoModel::edit(
                (object)[
                    'title' => $title,
                    'id' => $id,
                    'updated_at' => date('Y-m-d H:i:s'),

                ]
            );
        } 


       echo json_encode(['success'=>'Updated Successfully']);


    }

    // clear complete todo 
    public function clear($request){
        if(isset($_POST['id'])){
            TodoModel::delete(
                (object)[ 'id' => $_POST['id'],]
            );

        }else{
            TodoModel::delete(
                (object)['status' => 3,]
            );

        }

       echo json_encode(['success'=>'clear Successfully']);

    }
}