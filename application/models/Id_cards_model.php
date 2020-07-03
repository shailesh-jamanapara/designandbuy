<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Id_Cards_Model Extends Designandbuy_Model {

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
                'id_card_id' => array(
                    'caption' => array('id_card_id Of User', 'id_card_id`s Role', 'id_card_id Of User'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				 'standard_id' => array(
                    'caption' => array('standard_id ', 'standard_id', 'standard_id'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				 'full_name' => array(
                    'caption' => array('full_name ', 'full_name', 'full_name'),
                    'type' => 'varchar',
                    'len' => 30,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1,
					'modified'=>'students.full_name as full_name'
                ),
				'student_updated' => array(
                    'caption' => array('student_updated ', 'student_updated', 'student_updated'),
                    'type' => 'varchar',
                    'len' => 30,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1,
					'modified'=>'students.updated_on as student_updated'
                ),
				'mobile_no' => array(
                    'caption' => array('mobile_no ', 'mobile_no', 'mobile_no'),
                    'type' => 'varchar',
                    'len' => 30,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1,
					'modified'=>'users_contacts.contact_no as mobile_no'
                ),
				'emergency_contact_no' => array(
                    'caption' => array('emergency_contact_no ', 'emergency_contact_no', 'emergency_contact_no'),
                    'type' => 'varchar',
                    'len' => 30,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 0,
					'modified'=>'students.emergency_contact_no as emergency_contact_no'
                ),
				'address' => array(
                    'caption' => array('address ', 'address', 'address'),
                    'type' => 'varchar',
                    'len' => 30,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 0,
					'modified'=>'students.address as address'
                ),
				 'customer_id' => array(
                    'caption' => array('customer_id ', 'customer_id', 'customer_id'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'order_id' => array(
                    'caption' => array('order_id ', 'order_id', 'order_id'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'customer_template_id' => array(
                    'caption' => array('customer_template_id ', 'customer_template_id', 'customer_template_id'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				 'student_id' => array(
                    'caption' => array('student_id ', 'student_id', 'student_id'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				 'user_id' => array(
                    'caption' => array('user_id ', 'user_id', 'user_id'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				 'class_id' => array(
                    'caption' => array('class_id ', 'class_id', 'class_id'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'template_id' => array(
                    'caption' => array('template_id ', 'template_id', 'template_id'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'template_name' => array(
                    'caption' => array('template_name ', 'template_name', 'template_name'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => false),
                    'in_select' => 1,
                    'in_insert' => 0,
					'modified' => ' templates.template_name as template_name'
                ),
				'template_image_path' => array(
                    'caption' => array('template_image_path ', 'template_image_path', 'template_image_path'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => false),
                    'in_select' => 1,
                    'in_insert' => 0,
					'modified' => ' templates.template_image_path as template_image_path '
                ),
				'house_id' => array(
                    'caption' => array('house_id ', 'house_id', 'house_id'),
                    'type' => 'varchar',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => false),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				
				'sides' => array(
                    'caption' => array('sides ', 'sides', 'sides'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'order_date' => array(
                    'caption' => array('order_date ', 'order_date', 'order_date'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'imported_date' => array(
                    'caption' => array('imported_date ', 'imported_date', 'imported_date'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'proof_date' => array(
                    'caption' => array('proof_date ', 'proof_date', 'proof_date'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'verified_date' => array(
                    'caption' => array('verified_date ', 'verified_date', 'verified_date'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'printed_date' => array(
                    'caption' => array('printed_date ', 'printed_date', 'printed_date'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'delivered_date' => array(
                    'caption' => array('delivered_date ', 'delivered_date', 'delivered_date'),
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
                    'caption' => array('sides ', 'valid_from', 'valid_from'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'valid_thru' => array(
                    'caption' => array('valid_thru ', 'valid_thru', 'valid_thru'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'status' => array(
                    'caption' => array('Status ', 'Status', 'Status of Employee'),
                    'type' => 'enum',
                    'len' => array(1, 0),
                    'value' => 1,
                    'labels' => array('Active', 'Inactive'),
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
				'sms_link' => array(
                    'caption' => array('sms_link name', 'sms_link name', 'sms_link name'),
                    'type' => 'varchar',
                    'len' => 100,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1,
					'modified'=>' students.sms_link as sms_link'
                ),
				'token' => array(
                    'caption' => array('token name', 'token name', 'token name'),
                    'type' => 'varchar',
                    'len' => 100,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1,
					'modified'=>' students.token as token'
                ),
                'is_archived' => array(
                    'caption' => array('Is Archived', 'Is Archived ', 'Is Archived '),
                    'type' => 'enum',
                    'value' => 0,
                    'len' => array(1, 0),
                    'labels' => array('Yes', 'No'),
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'dob' => array('caption' => array('dob On', 'dob On', 'dob On'), 'type' => 'date', 'len' => 10, 'value' => null, 'rules' => array('is_required' => false, 'regex' => array('server' => 'yyyy:mm:dd', 'client' => 'mm/dd/yyyy')), 'modified' => ' DATE_FORMAT( students.dob, "%d-%m-%Y ") as dob ', 'in_select' => 1, 'in_insert' => 0),
                
            ),
            'cross_fields' => array(),
            'join_tables' => array(
                0 => array('students', 'students.id = ' . $this->getTable() . '.student_id ', 'left'),
                1 => array('users', 'users.id = ' . $this->getTable() . '.user_id ', 'left'),
                2 => array('users_contacts', 'users_contacts.user_id = ' . $this->getTable() . '.user_id ', 'left'),
                3 => array('templates', 'templates.id = ' . $this->getTable() . '.template_id ', 'left')
            ),
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
