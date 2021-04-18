<?php


namespace WTinder\Controllers;


use WTinder\Services\Images\UploadImageService;
use WTinder\Services\Users\SingInUsersService;

class ImageController extends Controller
{
    private UploadImageService $service;

    public function __construct(UploadImageService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function upload(): void
    {
        $this->service->execute(
            $_FILES["fileToUpload"]["name"],
            $_FILES["fileToUpload"]["tmp_name"],
            $_FILES["fileToUpload"]["size"]
        );
    }
}