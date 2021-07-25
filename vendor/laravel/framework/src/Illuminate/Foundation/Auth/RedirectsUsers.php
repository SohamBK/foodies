<?php

namespace Illuminate\Foundation\Auth;
use Illuminate\Support\Facades\Auth;


trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        if(Auth::user()->role == 'coustomer')
        {
            return '/';  
        }
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
