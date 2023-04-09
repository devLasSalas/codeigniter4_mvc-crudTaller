<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class verifyIsAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if ( session()->get('type') !== 'admin' )
        {
            return redirect()->back();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}