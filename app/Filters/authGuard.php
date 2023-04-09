<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class authGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (!session()->get('isLoggedIn'))
        {
            return redirect()
                ->to('/auth');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}