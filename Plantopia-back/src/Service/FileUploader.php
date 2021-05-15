<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\Plant;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{

    private $plantFolder;
    private $userFolder;

    public function __construct($plantFolder, $userFolder)
    {
        $this->plantFolder = $plantFolder;
        $this->userFolder = $userFolder;
    }

    /**
     * Et la j'ai la meme fonctionnalité dédiée à un cas particulier
     *
     * @param UploadedFile|null $image on autorise le null si jamais aucune image n'a été fournie
     * @return string|null
     */
    function moveImage(?UploadedFile $image, string $targetFolder, $prefix = ''): ?string
    {
        $newFilename = null;

        if ($image !== null) {
            // on a décidé d'appeler notre fichier
            $newFilename = $prefix . uniqid() . '.' . $image->guessExtension();

            // Move the file to the directory where brochures are stored
            $image->move(
                $targetFolder,
                $newFilename
            );
        }
        return $newFilename;
    }

    function movePlantPicture(?UploadedFile $image, Plant $plant)
    {
        $imageName = $this->moveImage($image, $this->plantFolder, 'plant-');
        if ($imageName !== null) {
            $plant->setPicture($imageName);
        }
    }

    function moveUserAvatar(?UploadedFile $image, User $user)
    {
        $imageName = $this->moveImage($image, $this->userFolder, 'user-');
        if ($imageName !== null) {
            $user->setAvatar($imageName);
        }
    }
}
