<?php

namespace App\Http\Middleware;

use App\Models\Operadore;
use Closure;
use Illuminate\Http\Request;

class checkDomici
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      

       $id =  request()->session()->all();

       if(!empty($id['id'])){

        $domiciliario = Operadore::find($id['id']);


        if($domiciliario->rol == 'domiciliario'){

              return $next($request);


        }else{

            return redirect('/');
        }
       }

       else{

          return redirect()->route('auth.login');
       }
    }
}
