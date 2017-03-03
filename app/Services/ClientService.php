<?php
/**
 * Created by PhpStorm.
 * User: egbrites
 * Date: 03/03/17
 * Time: 02:15
 */

namespace App\Services;


use App\Repositories\ClientRepository;
use App\Repositories\UserRepository;

class ClientService
{


    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    public function __construct(UserRepository $userRepository, ClientRepository $clientRepository)
    {

        $this->userRepository = $userRepository;
        $this->clientRepository = $clientRepository;
    }

    public function create(array  $data)
    {
        $data['user']['password'] = bcrypt(123456);
        $user = $this->userRepository->create($data['user']);

        $data['user_id'] = $user['id'];
        $this->clientRepository->create($data);

    }

    public function update(array  $data, $id)
    {
        $this->clientRepository->update($data,$id);

        $user_id = $this->clientRepository->find($id, ['user_id'])->user_id;

        $this->userRepository->update($data['user'], $user_id);
    }




}