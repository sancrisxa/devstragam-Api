<?php

class GaleriaController extends Controller
{
    public function index()
    {
        $dados = array(
            'fotos' => 3
        );
        $this->loadTemplate('galeria', $dados);
    }


}