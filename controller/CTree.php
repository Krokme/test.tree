<?php
namespace Controller;

use \Model\MTree as Tree;

/**
  * CClients controller
  *
  * PHP version 7.0.10
  *
  * @author    Genadijs Aleksejenko <agenadij@gmail.com>
  * @copyright 2021 Genadijs Aleksejenko
  */
class CTree extends Base
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
        $this->App->session->authorize();
    }

    /**
     * Main action
     *
     * @return void
     */
    public function main()
    {
        $this->_data['tree'] = '';
        $tree = new Tree($this->App);
        
        $this->_data['tree'] = $tree->renderTree();
        
        $this->render(\Core\App::view_path() . 'main', $this->_data);
    }
    
    /**
     * Create action
     *
     * @return mixed
     */
    public function create()
    {
        $this->_data['success'] = false;
        
        if ($this->App->request->method == 'POST') {

            $data = ['Name' => (string) $this->App->request->get('Name'),
                     'Description' => (string) $this->App->request->get('Description')
                    ];
            !$this->App->request->is_empty('id') ? $data['ParentId'] = (int) $this->App->request->get('id') : NULL;

            if (!$this->App->db->insert(TREE_TBL, $data)) {
                $this->_data['error'] = 'Can\'t create item!';
            } else {
                $this->_data['success'] = 'Created successfully!';
            }
            self::main();
            return true;
        }
        
        $this->render(\Core\App::view_path() . 'create', $this->_data);
    }
    
    /**
     * Update action
     *
     * @return void
     */
    public function update()
    {
        $this->_data['success'] = false;
        
        if ($this->App->request->method != 'POST' && $this->App->request->is_set('id')) {
            $rs = $this->App->db->getRow('SELECT * FROM ' . TREE_TBL . ' WHERE Id = :id',
                                         array('id' => (int) $this->App->request->get('id')));

            if ($rs) {
                $this->App->request->Name = $rs['Name'];
                $this->App->request->Description = $rs['Description'];
            }
        }
        if ($this->App->request->method == 'POST') {

            $data = ['Name' => (string) $this->App->request->get('Name'),
                     'Description' => (string) $this->App->request->get('Description')
                    ];
            
            if ($this->App->db->update(TREE_TBL, $data, ' Id = ' . (int) $this->App->request->get('id')) === false) {
                echo $this->App->db->getSQL(); exit;
                $this->_data['error'] = 'Can\'t update item!';
            } else {
                $this->_data['success'] = 'Saved successfully!';
            }
            
            self::main();
            return true;
        }
        
        $this->render(\Core\App::view_path() . 'update', $this->_data);
    }
    
    /**
     * Delete action
     *
     * @return void
     */
    public function delete()
    {
        if ($this->App->request->is_set('id')) {
            if (!$this->App->db->query('DELETE FROM ' . TREE_TBL . ' WHERE Id = :id',
                                      ['id' => (int) $this->App->request->get('id')])) {
                $this->_data['error'] = 'Can\'t delete item!';
            } else {
                $this->_data['success'] = 'Deleted successfully!';
            }
            self::main();
            return true;
        }
        self::main();
    }
}
