<?php
declare(strict_types=1);
namespace app\quizz\controller;
use app\quizz\model\Authentification;
use app\quizz\model\Utilisateur;

class UtilisateurController extends BaseController
{
    public function login()
    {
        $this->view('utilisateur/login');
    }
    public function login_form($username,$password)
    {
        $utilisateur = Utilisateur::checkUsernamePassword($username,$password);
        if ( $utilisateur!=null)
        {
            Authentification::getInstance()->login($utilisateur);
            $this->redirectTo('/home');
        }
         $this->redirectTo('/login');
    }
    public function register()
    {
        $this->view('utilisateur/register');
    }
    public function register_form($username,$password,$repeat_password)
    {
        if ((strlen($username)>3)&&(strlen($password)>4)&&($password==$repeat_password))
            {
                $newUtilisateur = new Utilisateur($username,Utilisateur::encryptPassword($password));
                Utilisateur::create($newUtilisateur);
                $this->redirectTo('/login');
            }
            else
            {
                $this->redirectTo('/register');
            }
    }
    public function logout()
    {
        Authentification::getInstance()->logout();
        $this->redirectTo('/');
    }


}
