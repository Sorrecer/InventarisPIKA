<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterStaff implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        //jika tidak ada sesi, kembali ke login
        if (session()->id_level == '') {
            return redirect()->to(base_url('login/index'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // jika ada sesi
        if (session()->id_level == '2') {
            return redirect()->to(base_url('/home'));
        }
    }
}
