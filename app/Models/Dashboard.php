<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    public static function cantFolAge($inicio, $fin){
        $users = DB::table('folders')
            ->whereBetween('folders.created_at', [$inicio, $fin])
            ->join('users', 'folders.user_id', '=', 'users.id')
            ->join('agencies', 'users.agency_id', '=', 'agencies.id')
            ->select('agencies.name', DB::raw('COUNT("folders"."id") as "total_fol"'), DB::raw('SUM("folders"."money") as "total_money"'))
            ->groupBy('agencies.name')
            ->get();
        return $users;
    }

    public static function cantFolAse($inicio, $fin){
        $users = DB::table('folders')
            ->whereBetween('folders.created_at', [$inicio, $fin])
            ->join('users', 'folders.user_id', '=', 'users.id')
            ->select('users.name', DB::raw('COUNT("folders"."id") as "total_fol"'), DB::raw('SUM("folders"."money") as "total_money"'))
            ->groupBy('users.name')
            ->get();
        return $users;
    }

    public static function cantAsigAse($inicio, $fin){
        $users = DB::table('assigns')
            ->whereBetween('assigns.created_at', [$inicio, $fin])
            ->join('users', 'assigns.user_id', '=', 'users.id')
            ->select('users.name', DB::raw('COUNT("assigns"."id") as "total_ass"'))
            ->groupBy('users.name')
            ->get();
        return $users;
    }
}
