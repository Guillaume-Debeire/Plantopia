<?php 

namespace App\Service;

use App\Entity\Genre;
use App\Entity\Plant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class Slugger 
{
    private $em;
    private $slugger;

    public function __construct(EntityManagerInterface $em, SluggerInterface $symfonySlugger)
    {
        $this->em = $em;
        $this->slugger = $symfonySlugger;
    }

    public function slugify($string) 
    {
        return $this->slugger->slug(strtolower($string));
    }

    public function slugifyPlant(Plant $plant)
    {
        $sluggedName = $this->slugify($plant->getName());

        // pour gérer les homonymes, on décide de rajouter l'id à la fin du slug
        $sluggedName .= '-' . $plant->getId();
        // c'est la meme chose que : 
        // $sluggedTitle = $sluggedTitle . '-' . $movie->getId();
        $plant->setSlug($sluggedName);

        // j'aimerai bien faire le flush de mon movie dans cette méthode
        $this->em->flush();

        return $plant;
    }

}