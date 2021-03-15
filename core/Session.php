<?php
namespace Core;

/**
 * Session handler class
 *
 * PHP version 7.0.10
 *
 * @author    Genadijs Aleksejenko <agenadij@gmail.com>
 * @copyright 2015 Genadijs Aleksejenko
 */

class Session {

    protected $App;
    protected   $save_path;
    public   $life_time;

    /**
     * Constructor
     *
     * @param onject $App App object
     */
    public function __construct(&$App)
    {
        session_set_save_handler(
            array($this, 'open'),
            array($this, 'close'),
            array($this, 'read'),
            array($this, 'write'),
            array($this, 'destroy'),
            array($this, 'gc')
        );

        register_shutdown_function('session_write_close');
        session_start();

        $App->setSessionId(session_id());
        $this->App = $App;
    }

    /**
     * Open session
     *
     * @param string $save_path
     * @param string $session_name
     *
     * @return bool
     */
    public function open($save_path, $session_name)
    {
        $this->save_path = $save_path;
        if (!is_dir($this->save_path)) {
            mkdir($this->save_path, 0777);
        }
        $this->life_time = time() + get_cfg_var('session.gc_maxlifetime');

        return true;
    }

    /**
     * Close session
     *
     * @return bool
     */
    public function close()
    {
        return true;
    }

    /**
     * read
     *
     * @param string $id
     *
     * @return mixed
     */
    public function read($id)
    {
        return (string)@file_get_contents("$this->save_path/sess_$id");
    }

    /**
     * write
     *
     * @param string $id
     * @param mixed $data
     *
     * @return bool
     */
    public function write($id, $data)
    {
        if (empty($id)) {
            return false;
        }

        file_put_contents("$this->save_path/sess_$id", $data);

        $rs = $this->App->db->getOne('SELECT * FROM ' . USERS_TBL . ' WHERE Tocken = :sess', array('sess' => (string) $id));
        if ($rs) {
            $this->App->db->update(USERS_TBL, array('Expires' => (int) $this->life_time), ' Tocken = \'' . $id . '\'');
            return true;
        }

        return true;
    }

    /**
     * destroy
     *
     * @param string $id
     *
     * @return bool
     */
    public function destroy($id)
    {
        $file = "$this->save_path/sess_$id";

        if (file_exists($file)) {
            unlink($file);
        }

        $this->remowe('UserId');
        $this->remowe('Username');

        $this->App->db->update(USERS_TBL, array('Tocken' => '', 'Expires' => null), ' Tocken = \'' . $id . '\'');

        return false;
    }

    /**
     * gc
     *
     * @param int $maxlifetime
     *
     * @return bool
     */
    public function gc($maxlifetime)
    {
        foreach (glob("$this->save_path/sess_*") as $file) {
            if (filemtime($file) + $maxlifetime < time() && file_exists($file)) {
                unlink($file);
            }
        }
        return true;
    }

    /**
     * Authorization
     *
     * @return bool
     */
    public function authorize()
    {
        $rs = $this->App->db->getRow('SELECT Id, Username FROM ' . USERS_TBL . ' WHERE Tocken = :sess AND Expires > :sess_exp',
            array('sess' => $this->App->getSessionId(), 'sess_exp' => (int) time()));

        if ($rs) {
            $this->set('UserId', $rs['Id']);
            $this->set('Username', $rs['Username']);
            return true;
        }

        if (!$rs) {
            $this->remowe('UserId');
            $this->remowe('Username');
            session_write_close();
            Header('Location: ' . PROJECT_PATH);
            exit;
        }

        return true;
    }

    /**
     * If is set data
     *
     * @param string $key
     *
     * @return mixed
     */
    public function is_set($key)
    {
        return isset($_SESSION[$key]) ? TRUE : FALSE;
    }

    /**
     * Get data
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * Set data
     *
     * @param string $key
     *
     * @return void
     */
    public function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    /**
     * Unset data
     *
     * @param string $key
     *
     * @return void
     */
    public function remowe($key)
    {
        unset($_SESSION[$key]);
    }
}
