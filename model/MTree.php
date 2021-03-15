<?php
namespace Model;

/**
 * MTree model
 *
 * PHP version 7.0.10
 *
 * @author    Genadijs Aleksejenko <agenadij@gmail.com>
 * @copyright 2021 Genadijs Aleksejenko
 */
class MTree extends Base
{
    private $_table = TREE_TBL;


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
     * Render tree
     *
     * @return void
     */
    public function renderTree($id = NULL)
    {
        $return = '';
        
        if (!empty($id)) {
            $rows = $this->App->db->getAll('SELECT * FROM ' . $this->_table . ' WHERE ParentId = :ParentId',
                                          ['ParentId' => $id]);
        } else {
            $rows = $this->App->db->getAll('SELECT * FROM ' . $this->_table . ' WHERE ParentId is NULL');
        }
        
        foreach ($rows as $row) {
            $return .= '
                        <tr class="treegrid-' . $row['Id'] . (!empty($row['ParentId']) ?  ' treegrid-parent-' . $row['ParentId'] . '"' : '') . '" data-key="' . $row['Id'] . '">
                            <td> ' . $row['Name'] . '</td>
                            <td class="col-lg-1" nowrap>
                            <a href="' . PROJECT_PATH . 'tree/create?id=' . $row['Id'] . '" title="Add"><span class="glyphicon glyphicon-plus"></span></a>&nbsp;
                            <a href="' . PROJECT_PATH . 'tree/update?id=' . $row['Id'] . '" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                            <a href="' . PROJECT_PATH . 'tree/delete?id=' . $row['Id'] . '" onclick="if (!confirm(\'Are you sure?\')) return false;" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>';
           $return .= self::renderTree($row['Id']);
        }
        
        return $return;
    }
}
