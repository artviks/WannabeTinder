<?php


namespace WTinder\Controllers;


use WTinder\Services\Images\UploadImageRequest;
use WTinder\Services\Images\UploadImageService;
use WTinder\Validators\ImageValidator;

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
        $validator = new ImageValidator($_FILES["fileToUpload"]);
        $validator->validate();

        if (empty($validator->getErrors())) {
            try {
                $this->service->execute(
                    new UploadImageRequest(
                        $_SESSION['auth_email'],
                        $_FILES["fileToUpload"]["name"],
                        $_FILES["fileToUpload"]["tmp_name"]
                    )
                );
            } catch (\RuntimeException $e) {
                $this->render('errors.twig', ['message' => $e->getMessage()]);
                return;
            }
            $this->redirect('profile');
            return;
        }

        $this->render('errors.twig', [
            'errors' => $validator->getErrors()
        ]);
    }
}