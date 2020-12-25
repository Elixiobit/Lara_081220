<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    public function index()
    {
        /*$sql = "
            CREATE TABLE test (
                id int PRIMARY KEY AUTO_INCREMENT,
                content varchar(50)
            )
        ";
        DB::statement($sql);*/

        /*$sql = "INSERT INTO test (content) VALUES (:content)";
        $result = DB::insert($sql, [':content' => 'test']);*/

        /*$sql = "SELECT * FROM test WHERE id = :id";
        $result = DB::select($sql, [':id' => 2]);
         dd($result);*/

        $result = DB::table('news')
            ->where(["id" => 3])
            ->get();

        dd($result);
    }
}
