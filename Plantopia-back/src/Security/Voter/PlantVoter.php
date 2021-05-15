<?php

namespace App\Security\Voter;

use App\Entity\Plant;
use App\Entity\User;
use App\Entity\CalendarSchedule;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class PlantVoter extends Voter
{
    // on utilise une constante de classe 
    //   - cela permet d'être sur que le nom du droit à tester est bien le meme partout
    const PLANT_READ = 'PLANT_READ';
    const PLANT_EDIT = 'PLANT_EDIT';
    const PLANT_DELETE = 'PLANT_DELETE';

    protected function supports($attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['PLANT_EDIT', 'PLANT_DELETE'])
            && $subject instanceof Plant;
    }

     /**
     * 
     * @param User $attribute le droit qui va être testé
     * @param Plant $subject l'entité sur laquelle l'utilisateur en session essaye d'agir
     * @param TokenInterface $token
     * @return void
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        /** @var User $user */
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        //if ($subject == self::PLANT_EDIT) {
        //    return true;
        //}   
     
        switch ($attribute) {
            case 'PLANT_EDIT':
                if (in_array('ROLE_ADMIN', $user->getRoles()))
                {
                    return true;
                }
                if ($user == $subject->getCalendarSchedule()->getUser())
                {
                    return true;
                }
            case 'PLANT_DELETE':
                if (in_array('ROLE_ADMIN', $user->getRoles()))
                {
                    return true;
                }
                if ($user == $subject->getCalendarSchedule()->getUser())
                {
                    return true;
                }
            break;
        }
        return false;
    }
}
