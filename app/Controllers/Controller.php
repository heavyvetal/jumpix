<?php

namespace app\Controllers;

use app\Http\{Request, Session};

abstract class Controller
{
    const ADMIN_STATUS  = 'admin';
    const GUEST_STATUS = 'guest';

    /**
     * @var string
     */
    protected $userStatus;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Session
     */
    protected $session;

    public function __construct(Request $request, Session $session)
    {
        $this->session = $session;
        $this->session->init();
        $this->request = $request;
        $this->userStatus = self::GUEST_STATUS;
        $this->checkUserStatus();
    }

    public function checkUserStatus()
    {
        if ($this->session->getValue('status') === 'admin') {
            $this->userStatus = self::ADMIN_STATUS;
        }
    }

    public function isLogged()
    {
        return $this->userStatus === self::ADMIN_STATUS;
    }

    public function redirect($destination)
    {
        header('Location: ' . $destination);
    }

    protected function render($view, $data = null)
    {
        if (isset($data)) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }

        require_once APPLICATION . 'resources/views/' . $view . '.php';
    }

    public function __call($name, $arguments)
    {
        throw new \Exception('Trere is no such an action');
    }
}
