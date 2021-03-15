<?php
namespace Controller;

/**
  * CLogin controller
  *
  * PHP version 7.0.10
  *
  * @author    Genadijs Aleksejenko <agenadij@gmail.com>
  * @copyright 2021 Genadijs Aleksejenko
  */
class CLogin extends Base
{
    private $_data;

    /**
     * Constructor
     *
     * @param object $App App object
     * @return void
     */
    public function __construct($App)
    {
        parent::__construct($App);
    }

    /**
     * Main action
     *
     * @return void
     */
    public function main()
    {
        if ($this->App->request->is_set('username') &&
            $this->App->request->is_set('password') &&
            $this->App->request->method == 'POST') {

            $rs = $this->App->db->getRow('SELECT Id, Username FROM ' . USERS_TBL . ' WHERE Username = :Username AND Psw = :Psw',
                                          array('Username' => $this->App->request->get('username'),
                                                'Psw' => md5($this->App->request->get('password'))));

            if ($rs) {
                $this->App->db->update(USERS_TBL, array('Expires' => (int) $this->App->session->life_time,
                                                        'Tocken' => $this->App->getSessionId()),
                                                        ' Id = ' . $rs['Id']);

                $this->App->session->set('UserId', $rs['Id']);
                $this->App->session->set('Username', $rs['Username']);
                exit(json_encode(['success' => true]));
            }
            exit(json_encode(['success' => false, 'error' => 'Incorrect Username or Password!']));

        } else {
            exit(json_encode(['success' => false, 'error' => 'Incorrect Username or Password!']));
        }
    }

    /**
     * Logout action
     *
     * @return void
     */
    public function logout()
    {
        $this->App->session->destroy(session_id());
        Header('Location: ' . PROJECT_PATH);
        exit;
    }
}
