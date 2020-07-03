<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Students_Model Extends Vect_Model {

    public $model;
    public $table_properties;
    public $id;
    public $fields = array();
    // $fields_pro Fields  property 
    public $fields_pro = array();
    public $fields_insert = array();
    public $where = array();
    public $join_tables;
    public $ids = array();

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
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 0
                ),
                $this->getTable() . '_id' => array(
                    'caption' => 'ID',
                    'type' => 'int',
                    'len' => 11,
                    'value' => null,
                    'is_pk' => true,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => ' ' . $this->getTable() . '.id as ' . $this->getTable() . '_id ',
                ),
                'customers_id' => array(
                    'caption' => array('Role Of User', 'Role`s Role', 'Role Of User'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'valid_from' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 100,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'schools_id' => array(
                    'caption' => array('Role Of User', 'Role`s Role', 'Role Of User'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'customer_templates_id' => array(
                    'caption' => array('Role Of User', 'Role`s Role', 'Role Of User'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				 'grn_no' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 250,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'roll_no' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 250,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'full_name' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 250,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'parent_name' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 250,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'father_name' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 100,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'mother_name' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 100,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'essential_mobile_no' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 20,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'optional_mobile_no' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 20,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'emergency_mobile_no' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 20,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'email_id' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 100,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'blood_group' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 20,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'dob' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 20,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'joining_date' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 20,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'leaving_date' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 20,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'standard' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 20,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'class' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 100,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'class_teacher_name' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 100,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'house' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 100,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'address' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 100,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'photo_1' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 250,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'photo_2' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 250,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'photo_3' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 250,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'scanning_method' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 250,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'year' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 50,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'created_on' => array(
                    'caption' => array('Created  On', 'Created On', 'Created On'),
                    'type' => 'date',
                    'len' => 10,
                    'value' => null,
                    'rules' => array('is_required' => true, 'regex' => array('server' => 'yyyy:mm:dd', 'client' => 'mm/dd/yyyy')),
                    'modified' => ' DATE_FORMAT(  ' . $this->getTable() . '.created_at, "%m/%d/%Y ") as created_at ',
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'created_by' => array(
                    'caption' => array('Updated On', 'Updated On', 'Updated On'),
                    'type' => 'int',
                    'len' => 10,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'updated_on' => array(
                    'caption' => array('Updated On', 'Updated On', 'Updated On'),
                    'type' => 'date',
                    'len' => 10,
                    'value' => null,
                    'rules' => array('is_required' => true, 'regex' => array('server' => 'yyyy:mm:dd', 'client' => 'mm/dd/yyyy')),
                    'in_select' => 1,
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
                    'caption' => array('Updated On', 'Updated On', 'Updated On'),
                    'type' => 'int',
                    'len' => 10,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'status' => array(
                    'caption' => array('Updated On', 'Updated On', 'Updated On'),
                    'type' => 'int',
                    'len' => 10,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1,
                    'modified' => ' ' . $this->getTable() . '.status as ' . $this->getTable() . '_status ',
                ),
                'icard_json' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 250,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                ),'icard_json_back' => array(
                    'caption' => array(' ', ' ', ' '),
                    'type' => 'varchar',
                    'len' => 250,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1
                )
                
            ),
            'cross_fields' => array(),
            'join_tables' => array(),
            'where' => array(),
            'has_many' => array(),
            'has_one' => array(),
            'belongs_to' => array(
                'user_roles' => array('key' => 'id'),
                'companies' => array('key' => 'id')
            )
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
     * Public function getAll of Users_Photos_Model class
     * @param integer $page
     * @param integer $limit
     * @param array $obArr 
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
     * Public function getById of Users_Photos_Model class
     * @param integer $id
     * @return array of result
     */

    public function getById($id) {
        return $this->getEntityById($id);
    }

    /*
     * Public function save_record of Users_Photos_Model class
     * 
     */

      public function save_record($id, $data = array()) {
        $this->id = $id;
	   $this->data =  $data;	
	   return $this->save();
    }

    /*
     * Public function getAllWithKeyValue of Users_Photos_Model class
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
                $rowArr[$row['id']] = $row['first_name'];
            }
        }
        return $rowArr;
    }

    /*
     * Public function getAllId of Users_Photos_Model class
     * 
     */

    public function getAllId($page = null, $limit = null, $condArr = array(), $obArr = array()) {
        $this->page = $page;
        $this->limit = $limit;
        $this->orderby['order_by'] = (!empty($obArr) && isset($obArr['sort_by'])) ? $obArr['sort_by'] : $this->getTable() . '.id';
        $this->orderby['order_type'] = (!empty($obArr) && isset($obArr['order_type'])) ? $obArr['order_type'] : ' ASC ';
        $rows = $this->getAllRecords();
        if (!empty($rows) && count($rows) > 0) {
            foreach ($rows as $row) {
                $this->ids[$row['id']] = $row['id'];
            }
        }
    }

    /*
     * Public function softDelete of Users_Photos_Model class
     * 
     */

    public function softDelete($id, $data = array()) {
        if (empty($data) || !is_numeric($id) || $id == 0 || $id == '') {
            return false;
        }
        $this->db->update($this->model, $data, 'id=' . $id);
        $this->last_insert_id = $id;
        return true;
    }

}
