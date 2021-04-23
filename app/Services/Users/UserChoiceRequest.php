<?php


namespace WTinder\Services\Users;


class UserChoiceRequest
{
    private string $choice;
    private string $like;
    private string $user;

    public function __construct(string $user, string $choice, string $like)
    {
        $this->choice = $choice;
        $this->like = $like;
        $this->user = $user;
    }

    public function getChoice(): string
    {
        return $this->choice;
    }

    public function getLike(): string
    {
        return $this->like;
    }

    public function getUser(): string
    {
        return $this->user;
    }
}