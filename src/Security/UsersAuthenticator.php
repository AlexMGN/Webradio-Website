<?php

namespace App\Security;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Guard\PasswordAuthenticatedInterface;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class UsersAuthenticator extends AbstractFormLoginAuthenticator 
{
    use TargetPathTrait;

    private $entityManager;
    private $urlGenerator;
    private $csrfTokenManager;
    private $passwordEncoder;

    public function __construct(EntityManagerInterface $entityManager, UrlGeneratorInterface $urlGenerator, CsrfTokenManagerInterface $csrfTokenManager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->entityManager = $entityManager;
        $this->urlGenerator = $urlGenerator;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function supports(Request $request)
    {
        return 'app.login' === $request->attributes->get('_route')
            && $request->isMethod('POST');
    }

    public function getCredentials(Request $request)
    {
        $credentials = [
            'email' => $request->request->get('_username'),
            'password' => $request->request->get('_password'),
        ];
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['email']
        );

        return $credentials;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        /*$token = $credentials['tokenApi'];
        if (null === $token) {
            
            return $this->urlGenerator->generate('home.index');
        }*/

        $user = $this->entityManager->getRepository(Users::class)->findOneBy(['email' => $credentials['email']]);

        if (!$user) {
              return null;
        }

        return $user;
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
         return true;
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    /*public function getPassword($credentials): ?string
    {
        return $credentials['password'];
    }*/

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        if ($this->authorizationChecker->isGranted('ROLE_SUPER_ADMIN')) 
        {
            return new RedirectResponse($this->urlGenerator->generate('superadmin.index'));
        
        }elseif($this->authorizationChecker->isGranted('ROLE_ADMIN')){

            return new RedirectResponse($this->urlGenerator->generate('admin.index'));
        
        }else{

            return new RedirectResponse($this->urlGenerator->generate('profile.index'));
        }
        return null;

    }

    protected function getLoginUrl()
    {
        return $this->urlGenerator->generate('home.index');
    }
}
