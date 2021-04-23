<?php

 namespace WTinder\Services\Users;


 use WTinder\Models\UserUser;
 use WTinder\Repositories\UsersLikesRepositoryInterface;
 use WTinder\Repositories\UsersRepositoryInterface;

 class SaveUsersChoicesService
 {
     private UsersLikesRepositoryInterface $likesRepository;
     private UsersRepositoryInterface $usersRepository;

     public function __construct(
         UsersLikesRepositoryInterface $likesRepository,
         UsersRepositoryInterface $usersRepository
     )
    {
        $this->likesRepository = $likesRepository;
        $this->usersRepository = $usersRepository;
    }

    public function execute(UserChoiceRequest $request): void
    {
        $user = $this->usersRepository->getBy($request->getUser());
        $likedUser = $this->usersRepository->getBy($request->getChoice());

        $this->likesRepository->save(new UserUser($user, $likedUser, $request->getLike()));
    }
 }