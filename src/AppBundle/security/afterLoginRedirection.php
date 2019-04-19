<?php

namespace AppBundle\security;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

class afterLoginRedirection implements AuthenticationSuccessHandlerInterface {

    protected $router;
    protected $authorizationChecker;

    public function __construct(Router $router) {
        $this->router = $router;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token) {

        // Get list of roles for current user

        $roles = $token->getRoles();

// Tranform this list in array

        $rolesTab = array_map(function($role){

            return $role->getRole();

        }, $roles);

// If is a admin or super admin we redirect to the backoffice area



// otherwise, if is a commercial user we redirect to the crm area

        if (in_array('ROLE_AGENT', $rolesTab, true))

            $redirection = new RedirectResponse($this->router->generate('youssef_back_ajouter_offre'));


        elseif (in_array('ROLE_CLIENT', $rolesTab, true) )

            $redirection = new RedirectResponse($this->router->generate('home'));

// otherwise we redirect user to the member area
        elseif (in_array('ROLE_EXPERT', $rolesTab, true) )

            $redirection = new RedirectResponse($this->router->generate('ali_back_rendezVous_view_traitee'));
        elseif (in_array('ROLE_ADMIN', $rolesTab, true) )

            $redirection = new RedirectResponse($this->router->generate('yassine_front_experienceliste'));
        else

            $redirection = new RedirectResponse($this->router->generate('homepage'));

        return $redirection;
    }

}