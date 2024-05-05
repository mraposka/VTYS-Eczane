<?php
namespace App\Filters;

use App\Models\EczaneModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Session implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $session = session();
        $user_id = $model->findUser($session->get('user_id'));
        if ($session->get('user_id') != $user_id)
            return redirect()->route('Giris');
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        try {
            $session = session();
        } catch (\Throwable $th) {
        }
        $url = current_url();
        $user_id = $session->get('user_id');
        $date = date("Y/m/d h:i:s");
        $data = "URL:$url\nUser:$user_id\nDate:$date\n****************************\n";
        file_put_contents("log.txt", $data, FILE_APPEND);
    }
}
?>