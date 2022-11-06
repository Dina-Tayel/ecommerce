<?php 
namespace App\Traits ;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{

   public function checkGuard($request)
   {
    if ($request->type  == 'admin') {

        $guardName = 'admin';

    } elseif ($request->type  == 'seller') 
    {
        $guardName = 'seller';

    } else {

        $guardName = 'web';
    }
 
    return $guardName ;
   }

   public function LoginRedirect($request)
   {

    if ($request->type == 'admin') {

        // return redirect()->url('/admin/home');
        return redirect()->intended(RouteServiceProvider::ADMIN);

    } elseif ($request->type == 'seller') {

        return 'seller';

    } else {

        return redirect()->intended(RouteServiceProvider::HOME);
    }

   }
   public function LogoutRedirect($type)
   {
    if ($type == 'admin') {

        return  redirect()->route('login', $type);

    }elseif($type == 'seller'){

        return 'seller';
    }else{    //web

        return  redirect()->route('login','user');
    }

   }
}