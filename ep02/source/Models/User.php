<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer
{
    public function __construct()
    {
        parent::__construct("users", ["first_name", "last_name"]);
    }

    public function adressess()
    {
       return (new Address())->find("user_id = :uid", "uid={$this->id}")->fetch(true);
    }

    public function add(Address $address, string $first_name, string $last_name, string $genre): Address
    {
        $this->user_id = $user->id;
        $this->first_name = $first_name;
        $this->last_name = last_name;

        return $this;
    }

    /*public function save()
    {
        // verifico o email
        parent::save();
    }*/
}