<?php

class HomeController extends Controller
{
    public function index()
    {
        $array = array(
            'nome' => 'Antonio',
            'idade' => '10'
        );

        $this->returnJson($array);
    }

    public function testando()
    {
        echo 'teste';
    }

    public function visualizar_usuarios($id)
    {
        echo 'id: ' . $id;
    }
}