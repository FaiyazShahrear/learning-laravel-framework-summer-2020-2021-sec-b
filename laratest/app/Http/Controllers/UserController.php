<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = $this->getUserList();
        return view('user.list')->with('userList', $users);
    }

    public function details($id){
        $users = $this->getUserList();
        $user = '';
        foreach($users as $u){
            if($u['id'] == $id){
                $user = $u;
                break;
            }
        }
        return view('user.details')->with('user', $user);
    }

    public function create(){
        return view('user.create');
    }
    public function insert(Request $req){
        $users = $this->getUserList();
        $user = ['id'=>$req->id, 'name'=>$req->uname, 'email'=>$req->email];
        array_push($users, $user);

        return view('user.list')->with('userList', $users);
    }

    public function edit($id){
        //find user by id from userlist $user

        $users=$this->getUserList();
 
        $user = '';
        foreach($users as $u){
            if($u['id'] == $id){
                $user = $u;
                break;
            }
        }
        return view('user.edit')->with('user', $user);
    }

    public function update(Request $req, $id){
       
        $users = $this->getUserList();

        for($i=0; $i<sizeof($users); $i++){
            if($users[$i]['id'] == $id){

                $users[$i]['id'] = $req->id;
                $users[$i]['name'] = $req->uname;
                $users[$i]['email'] = $req->email;
                $users[$i]['type'] = $req->type;
                break;
            }
        } 
        return view('user.list')->with('userList', $users);
    }


    public function delete($id){
        //confirm window
        //find user by id $user
        $users = $this->getUserList();
        
        $user = '';
        foreach($users as $u){
            if($u['id'] == $id){
                $user = $u;
                break;
            }
        }
        return view('user.list')->with('user', $user);
    }

    public function destroy($id){
        //remove user form list
        //create new list & display

        return view('user.list')->with('user', $users);
    }


    public function getUserList(){
        return [
            ['id'=>1, 'name'=>'Faiyaz', 'email'=>'email@email.com', 'type'=>'admin'],
            ['id'=>2, 'name'=>'abc', 'email'=>'abc@email.com','type'=>'admin'],
            ['id'=>3, 'name'=>'xyz', 'email'=>'xyz@email.com','type'=>'user']
        ];
    }
}