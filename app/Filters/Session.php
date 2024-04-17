<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Session implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if ($session->get('user_id') != '8fqJY6B2lmkhzbg55W66VZ3iaOAY4cchsTMMFMWAi2XMOJ2HVoHvDk4MrBUkGhHP4PpUkHaKEq87SWRpOZi5k2cIdX0w9Tou9hwzUrIdtq701EO399LbGSYJUspPsyOq0U5lXvkYP8GBpUZC1M8c0ICaCGxQwYZkgm7LrSg04tMpt7Ck3KjwQsKoAwrsoKDvAwXjiWzIvaP3P0rlUHfBDQHhMjPKfAAmsVgZEjdVlVSdUV4xJQWktLwJtFR9mI')
            return redirect()->route('Giris');
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
?>