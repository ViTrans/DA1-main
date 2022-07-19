<?php

class AdminModel extends BaseModel
{

    const TABLE = 'admin';

    public function searchEmail($email)
    {
        return $this->getEmail(self::TABLE, $email);
    }
}