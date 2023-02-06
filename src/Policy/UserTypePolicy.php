<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\UserType;
use Authorization\IdentityInterface;

use Authorization\Policy\BeforePolicyInterface;

use App\Utility\PolicyFunctions;

/**
 * UserType policy
 */
class UserTypePolicy implements BeforePolicyInterface
{
    /**
     * Defines a pre-authorization check.
     *
     * If a boolean value is returned, the action check will be skipped and pre-authorization
     * check result will be returned. In case of `null`, the action check will take place.
     *
     * @param \Authorization\IdentityInterface|null $user Identity object.
     * @param mixed $resource The resource being operated on.
     * @param string $action The action/operation being performed.
     * @return \Authorization\Policy\ResultInterface|bool|null
     */
    public function before($user, $resource, $action)
    {
        $functions = new PolicyFunctions;

        if($functions->isUserAuthorized($user,[1])) {
            return true;
        }
        
        /*
        if ($user->getOriginalData()->is_admin()) {
            return true;
        }
        */
    }

    /**
     * Check if $user can add UserType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserType $userType
     * @return bool
     */
    public function canAdd(IdentityInterface $user, UserType $userType)
    {
        /*
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[2]);
        */
    }

    /**
     * Check if $user can edit UserType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserType $userType
     * @return bool
     */
    public function canEdit(IdentityInterface $user, UserType $userType)
    {
        /*
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[2]);
        */
    }

    /**
     * Check if $user can delete UserType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserType $userType
     * @return bool
     */
    public function canDelete(IdentityInterface $user, UserType $userType)
    {
        //TODO check if deleting with foreignkey restrictions or forced cascade
        //Only allow forced cascade with admin roles.
        /*
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[2]);
        */
    }

    /**
     * Check if $user can view UserType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserType $userType
     * @return bool
     */
    public function canView(IdentityInterface $user, UserType $userType)
    {
        $functions = new PolicyFunctions;

        return $functions->isUserAuthorized($user,[2,3]);
    }
}
