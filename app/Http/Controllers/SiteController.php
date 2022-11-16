<?php

namespace App\Http\Controllers;

use App\Models\CestaCliente;
use Illuminate\Support\Facades\Auth;
use App\Models\Produto;
use App\Models\Ong;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function view_home()
    {
        return view('pages.site.home', ['titulo' => '' ]);
    }

}
