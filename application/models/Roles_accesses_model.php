<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Roles_Accesses_Model Extends Designandbuy_Model {

    public $model;
    public $table_properties;
    public $id;
    public $fields = array();
    // $fields_pro Fields  property 
    public $fields_pro = array();
    public $fields_insert = array();
    public $where = array();
    public $join_tables;

    public function init() {
        parent::init();
    }

    public function __construct($model = null) {
        parent::__construct();
        $cls = get_class($this);
        $split = explode('_', $cls);
        if (!empty($split)) {
            $concate = $split[0];
            if (count($split) > 0) {
                $split = array_reverse($split);
                unset($split[0]);
                $split = array_reverse($split);
                $concate = implode('_', $split);
            }
            $this->model = strtolower($concate);
        }
        $this->setTable(strtolower($this->model));
        $this->setTableProperties();
        $this->setCols();
        $this->setJoins();
    }

    public function setId($id) {
        $this->id = $id;
    }

    private function setTableProperties() {
        $this->table_properties = array(
            'fields' => array(
                'id' => array(
                    'caption' => 'ID',
                    'type' => 'int',
                    'len' => 11,
                    'value' => null,
                    'is_pk' => true,
                    'in_select' => 1,
                    'in_insert' => 0,
                    'rules' => array('is_required' => true)
                ),
                $this->getTable() . '_id' => array(
                    'caption' => 'ID',
                    'type' => 'int',
                    'len' => 11,
                    'value' => null,
                    'is_pk' => true,
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => ' ' . $this->getTable() . '.id as ' . $this->getTable() . '_id ',
                ),
                'module_controller' => array(
                    'caption' => 'ID',
                    'type' => 'int',
                    'len' => 11,
                    'value' => null,
                    'is_pk' => true,
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => ' system_modules.module_controller as module_controller ',
                ),
                'module_action' => array(
                    'caption' => 'ID',
                    'type' => 'int',
                    'len' => 11,
                    'value' => null,
                    'is_pk' => true,
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => ' system_modules.module_action as module_action ',
                ),
                'module_sub_action' => array(
                    'caption' => 'ID',
                    'type' => 'int',
                    'len' => 11,
                    'value' => null,
                    'is_pk' => true,
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => ' system_modules.module_sub_action as module_sub_action ',
                ),
                'system_module_name' => array(
                    'caption' => 'ID',
                    'type' => 'int',
                    'len' => 11,
                    'value' => null,
                    'is_pk' => true,
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => ' system_modules.system_module_name as system_module_name ',
                ),
                'parent_id' => array(
                    'caption' => 'ID',
                    'type' => 'int',
                    'len' => 11,
                    'value' => null,
                    'is_pk' => true,
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => ' system_modules.parent_id as parent_id ',
                ),
                'role_id' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'int', 'len' => 4, 'is_fk' => true, 'value' => null, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'system_module_id' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'int', 'len' => 4, 'is_fk' => false, 'value' => null, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'module_section' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => null, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'add_attribute' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => null, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'max_add_attribute' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'edit_attribute' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'max_edit_attribute' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'delete_attribute' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'max_delete_attribute' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'add_entity' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'max_add_entity' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'edit_entity' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'max_edit_entity' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'view_entity' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'max_view_entity' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'delete_entity' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'max_delete_entity' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'import_entity' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'max_import_entity' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'export_entity' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'max_export_entity' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'upload_image' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'max_upload_image' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'upload_doc' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'max_upload_doc' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'download_doc' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'full_control' => array('caption' => array('Module Access', 'Module Access', 'Module Access'), 'type' => 'varchar', 'len' => 250, 'is_fk' => false, 'value' => 1, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'status' => array(
                    'caption' => array('Status ', 'Status', 'Status of Employee'),
                    'type' => 'enum',
                    'len' => array(1, 0),
                    'in_select' => 1,
                    'value' => 1,
                    'in_insert' => 1,
                    'labels' => array('Active', 'Inactive'),
                    'rules' => array('is_required' => true),
                ),
                'created_at' => array(
                    'caption' => array('Created  On', 'Created On', 'Created On'),
                    'type' => 'date',
                    'len' => 10,
                    'value' => null,
                    'rules' => array('is_required' => true, 'regex' => array('server' => 'yyyy:mm:dd', 'client' => 'mm/dd/yyyy')),
                    'modified' => ' DATE_FORMAT(  ' . $this->getTable() . '.created_at, "%m/%d/%Y ") as created_at ',
                    'in_select' => 0,
                    'in_insert' => 1
                ),
                'created_by' => array(
                    'caption' => array('Created By', 'Created By', 'Created By'),
                    'type' => 'int',
                    'len' => 10,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 0,
                    'in_insert' => 1
                ),
                'updated_on' => array(
                    'caption' => array('Updated On', 'Updated On', 'Updated On'),
                    'type' => 'date',
                    'len' => 10,
                    'value' => null,
                    'rules' => array('is_required' => true, 'regex' => array('server' => 'yyyy:mm:dd', 'client' => 'mm/dd/yyyy')),
                    'in_select' => 1,
                    'modified' => ' DATE_FORMAT(  ' . $this->getTable() . '.updated_on, "%m/%d/%Y ") as ' . $this->getTable() . '_updated_on ',
                    'in_insert' => 1
                ),
                'updated_by' => array(
                    'caption' => array('Updated On', 'Updated On', 'Updated On'),
                    'type' => 'int',
                    'len' => 10,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'is_archived' => array(
                    'caption' => array('Is Archived', 'Is Archived ', 'Is Archived '),
                    'type' => 'int',
                    'value' => 0,
                    'len' => array(1, 0),
                    'labels' => array('Yes', 'No'),
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'sort_order' => array(
                    'caption' => array('Sort Order ID', 'Sort Order', 'Sort Order'),
                    'type' => 'int',
                    'len' => 4,
                    'value' => 1,
                    'is_fk' => true,
                    'in_select' => 1,
                    'in_insert' => 1,
                    'rules' => array('is_required' => true),
                ),
            ),
            'join_tables' => array(
                0 => array('system_modules', 'system_modules.id = ' . $this->getTable() . '.system_module_id ', 'left'),
                1 => array('roles', 'roles.id = ' . $this->getTable() . '.role_id ', 'left')
            ),
            'where' => array()
        );
    }

    public function setCols() {
        if (isset($this->table_properties['fields']) && !empty($this->table_properties['fields'])) {
            foreach ($this->table_properties['fields'] as $key => $flds) {
                if (isset($flds['in_select']) &&  !empty($flds['in_select']) ) {
                    $this->fields[$key] = (isset($flds['modified']) && $flds['modified'] != '') ? $flds['modified'] : $this->getTable() . "." . $key;
                    $this->fields_pro[$key]['label'] = $flds['caption'][1];
                    $this->fields_pro[$key]['type'] = $flds['type'];
                    $this->fields_pro[$key]['value'] = (isset($flds['value'])) ? $flds['value'] : null;
                    $this->fields_pro[$key]['len'] = $flds['len'];
                    if (isset($flds['rules']) && !empty($flds['rules'])) {
                        $this->fields_pro[$key]['rules'] = $flds['rules'];
                    }
                }
                if (isset($flds['in_insert']) && $flds['in_insert'] > 0) {
                    $val = (isset($flds['value'])) ? $flds['value'] : null;
                    $type = (isset($flds['type'])) ? $flds['type'] : 'varchar';
                    $this->fields_insert[$key] = $val;
                }
            }
        }
        if (isset($this->table_properties['cross_fields']) && !empty($this->table_properties['cross_fields'])) {
            foreach ($this->table_properties['cross_fields'] as $key => $flds) {
                if (isset($flds['in_select']) &&  !empty($flds['in_select']) ) {
                    $this->fields[$key] = (isset($flds['modified']) && $flds['modified'] != '') ? $flds['modified'] : $this->getTable() . "." . $key;
                    $this->fields_pro[$key]['label'] = $flds['caption'][1];
                    $this->fields_pro[$key]['type'] = $flds['type'];
                    $this->fields_pro[$key]['value'] = (isset($flds['value'])) ? $flds['value'] : null;
                    $this->fields_pro[$key]['len'] = $flds['len'];
                    if (isset($flds['rules']) && !empty($flds['rules'])) {
                        $this->fields_pro[$key]['rules'] = $flds['rules'];
                    }
                }
            }
        }
    }

    public function setJoins() {
        if (isset($this->table_properties['join_tables']) && !empty($this->table_properties['join_tables'])) {
            $this->joins = $this->table_properties['join_tables'];
        }
    }

    /*
     * Public function getAll of Roles_Accesses_Model class
     * @param integer $page
     * @param integer $limit
     * @param array   $obArr 
     * @return array of result
     */

    public function getAll($page = null, $limit = null, $obArr = array()) {
        $this->page = $page;
        $this->limit = $limit;
        $this->orderby['order_by'] = (!empty($obArr) && isset($obArr['sort_by'])) ? $obArr['sort_by'] : $this->getTable() . '.id';
        $this->orderby['order_type'] = (!empty($obArr) && isset($obArr['order_type'])) ? $obArr['order_type'] : ' ASC ';
        $rows = $this->getAllRecords();
        return $rows;
    }

    /*
     * Public function getById of Roles_Accesses_Model class
     * @param integer $id
     * @return array of result
     */

    public function getById($id) {
        return $this->getEntityById($id);
    }

    /*
     * Public function save_record of Roles_Accesses_Model class
     * 
     */

    public function save_record($id, $data = array()) {
        $this->id = $id;
	   $this->data =  $data;	
	   return $this->save();
    }

    /*
     * Public function getAllWithKeyValue of Roles_Accesses_Model class
     * 
     */

    public function getAllWithKeyValue( $obArr=array() ) {
        $this->page = null;
        $this->limit = null;
        $this->orderby['order_by'] = (!empty($obArr) && isset($obArr['sort_by'])) ? $obArr['sort_by'] : $this->getTable() . '.id';
        $this->orderby['order_type'] = (!empty($obArr) && isset($obArr['order_type'])) ? $obArr['order_type'] : ' DESC ';
        $rows = $this->getAllRecords();
        $rowArr = array();
        if (!empty($rows) && count($rows) > 0) {
            foreach ($rows as $row) {
                $rowArr[$row['id']] = $row;
            }
        }
        return $rowArr;
    }

}
