<?php

class Users
{
    private array $usersList;
    private string $PATTERN;

    public function __construct()
    {
        $this->PATTERN = "/@#|#/";
    }
    public function add($users)
    {
        if (is_string($users)) {
            if (!preg_match($this->PATTERN, $users)) {
                $this->usersList[] = $users;
            }
        }
        if (is_array($users)) {
            foreach ($users as $singleUser) {
                if (!preg_match($this->PATTERN, $singleUser)) {
                    $this->usersList[] = $singleUser;
                }
            }
        }
    }

    public function getSpecialUser()
    {
        rsort($this->usersList);
        return explode(' ', $this->usersList[0])[1];
    }
}