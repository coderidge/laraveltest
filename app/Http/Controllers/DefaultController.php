<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DefaultController extends Controller
{
    public function index() {

        $results = DB::select(DB::raw("select users.id,users.name, CASE
        WHEN roles.name IS NOT NULL THEN roles.name
        ELSE 'buyer'
        END AS role,email,company_name,users.created_at as registered_on,last_login
        from users join profiles on users.id=profiles.user_id
        left join model_has_roles on users.id=model_has_roles.model_id
        left join roles on roles.id=model_has_roles.role_id"));

        return view('users',['results' => $results]);

    }

}
