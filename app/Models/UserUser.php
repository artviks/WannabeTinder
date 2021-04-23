<?php


namespace WTinder\Models;


class UserUser
{
    private UserDTO $user;
    private UserDTO $likedUser;
    private string $choice;

    public function __construct(UserDTO $user, UserDTO $likedUser, string $choice)
    {
        $this->user = $user;
        $this->likedUser = $likedUser;
        $this->choice = $choice;
    }

    public function getUser(): UserDTO
    {
        return $this->user;
    }

    public function getChoice(): string
    {
        return $this->choice;
    }

    public function getLikedUser(): UserDTO
    {
        return $this->likedUser;
    }
}