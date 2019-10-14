<?php

namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Photos;

class UsersController extends Controller 
{
    public function random()
    {
        $array = array('error' => '', 'logged' => false);

		$method = $this->getMethod();
		$data = $this->getRequestData();

		$users = new Users();
		$p = new Photos();

		if (!empty($data['jwt']) && $users->validateJwt($data['jwt'])) {
			$array['logged'] = true;

			if ($id_user == $users->getId()) {
				$array['is_me'] = true;
			}

			if ($method == 'GET') {

				$per_page = 10;
				if (!empty($data['per_page'])) {
					$per_page = intval($data['per_page']);
                }
                
                $excludes = array();

                if (!empty($data['excludes'])) {
                    $excludes = explode(',', $data['excludes']);
                }

				$array['data'] = $p->getRandomPhotos($per_page. $excludes);
				
			} else {
				$array['error'] = 'Método' . $method . 'não disponível';
			}

		} else {
			$array['error'] = 'Acesso negado';
		}

	
		$this->returnJson($array);
	}
	
	public function view($id_photo)
	{
		$array = array('error' => '', 'logged' => false);

		$method = $this->getMethod();
		$data = $this->getRequestData();

		$users = new Users();
		$p = new Photos();

		if (!empty($data['jwt']) && $users->validateJwt($data['jwt'])) {
			$array['logged'] = true;

			if ($id_user == $users->getId()) {
				$array['is_me'] = true;
			}

			if ($method == 'GET') {
				$array['logged'] = true;

				switch ($method) {
					case 'GET':

						$array['data'] = $p->getPhoto($id_photo);
						break;

					case 'DELETE':
						$array['error'] = $p->deletePhoto($id_photo, $users->getId());
						break;

					default:
						$array['error'] = 'Método ' . $method . ' não disponível';
						break;
				}

				
			} else {
				$array['error'] = 'Método' . $method . 'não disponível';
			}

		} else {
			$array['error'] = 'Acesso negado';
		}

	
		$this->returnJson($array);
	}
}