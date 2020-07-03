<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Customer_Addresses_Model Extends Designandbuy_Model {

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
                'customer_id' => array(
                    'caption' => array('User Id', 'User Id', 'User Id'),
                    'type' => 'int',
                    'len' => 4,
                    'is_fk' => true,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'address_type_id' => array(
                    'caption' => array('Type Of User', 'Type Of User', 'Type Of User'),
                    'type' => 'int',
                    'len' => 1,
                    'is_fk' => true,
                    'table' => 'positions',
                    'in_select' => 1,
                    'in_insert' => 1,
                    'rules' => array('is_required' => false),
                ),
                'address_type' => array(
                    'caption' => array('Type Of address', 'Type Of address', 'Type Of address'),
                    'type' => 'int',
                    'len' => 1,
                    'is_fk' => true,
                    'table' => 'positions',
                    'in_select' => 1,
                    'in_insert' => 0,
                    'rules' => array('is_required' => false),
                    'modified' => ' address_types.address_type as address_type',
                ),
                'address' => array(
                    'caption' => array('Address ', 'Address', 'Address of Employee'),
                    'type' => 'varchar',
                    'len' => 150,
                    'value' => '',
                    'in_select' => 1,
                    'in_insert' => 1,
                    'rules' => array('is_required' => true, 'regex' => array('server' => '/[^a-zA-Z.\ ]', 'client' => '^[a-zA-Z0-9]_-=()[]\.?!]+$', 'message' => 'Special characters not allowed')),
                    'help' => 'Max. 150 Characters'
                ),
                'city_id' => array(
                    'caption' => array('City ID', 'City Name', 'Name of City'),
                    'type' => 'int',
                    'len' => 4,
                    'value' => null,
                    'is_fk' => true,
                    'table' => 'cities',
                    'in_select' => 1,
                    'in_insert' => 1,
                    'rules' => array('is_required' => true),
                ),
                'state_id' => array(
                    'caption' => array('State ID', 'State Name', 'State'),
                    'type' => 'int',
                    'len' => 4,
                    'value' => null,
                    'is_fk' => true,
                    'in_select' => 1,
                    'in_insert' => 1,
                    'rules' => array('is_required' => true),
                ),
                'country_id' => array(
                    'caption' => array('Country ID', 'Country Name', 'Country'),
                    'type' => 'int',
                    'len' => 4,
                    'value' => 2,
                    'is_fk' => true,
                    'table' => 'countries',
                    'in_select' => 1,
                    'in_insert' => 1,
                    'rules' => array('is_required' => true),
                ),
                'zipcode' => array(
                    'caption' => array('Zip/Postal Code', 'Zip/Postal Code', 'Zip/Postal Code'),
                    'type' => 'int',
                    'len' => 6,
                    'value' => null,
                    'is_fk' => true,
                    'table' => 'countries',
                    'in_select' => 1,
                    'in_insert' => 1,
                    'rules' => array('is_required' => true, 'regex' => array('server' => '/[^a-zA-Z.\ ]', 'client' => '^[0-9]+$', 'message' => 'Allows only Numbers')),
                    'help' => 'Only 6 length of Numbers'
                ),
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
                    'type' => 'enum',
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
            'cross_fields' => array(
                'state_name' => array(
                    'caption' => array('State Name', 'State Name', 'State of Employee'),
                    'type' => 'varchar',
                    'len' => 100,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => ' states.state_name as state_name'
                ),
                'city_name' => array(
                    'caption' => array('City Name', 'city_name Name', 'city_name of Employee'),
                    'type' => 'varchar',
                    'len' => 100,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => ' cities.city_name as city_name'
                ),
                'country_icon' => array(
                    'caption' => array('Country ID', 'Country Name', 'Country'),
                    'type' => 'int',
                    'len' => 4,
                    'value' => 2,
                    'is_fk' => true,
                    'table' => 'countries',
                    'in_select' => 1,
                    'in_insert' => 0,
                    'rules' => array('is_required' => true),
                    'modified' => ' countries.country_icon as country_icon'
                ),
            ),
            'join_tables' => array(
                0 => array('countries', 'countries.id = ' . $this->getTable() . '.country_id ', 'left'),
                1 => array('states', 'states.id = ' . $this->getTable() . '.state_id ', 'left'),
                2 => array('cities', 'cities.id = ' . $this->getTable() . '.city_id ', 'left'),
                3 => array('address_types', 'address_types.id = ' . $this->getTable() . '.address_type_id ', 'left'),
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

    public function setId($id) {
        $this->id = $id;
    }

    /*
     * Public function getAll of Users_Addresses_Model class
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
     * Public function getById of Users_Addresses_Model class
     * @param integer $id
     * @return array of result
     */

    public function getById($id) {
        return $this->getEntityById($id);
    }

    /*
     * Public function save_record of Users_Addresses_Model class
     * 
     */

    public function save_record($id, $data = array()) {
        $this->id = $id;
	   $this->data =  $data;	
	   return $this->save();
    }

    /*
     * Public function getAllWithKeyValue of Users_Addresses_Model class
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
                if (!empty($concatArr)) {
                    $cols = '';
                    foreach ($concatArr as $arr) {
                        $cols .= $row[$arr];
                    }
                    $rowArr[$row['id']] = $cols;
                } else {
                    $rowArr[$row['id']] = $row['address'] . "  " . $row['address'];
                }
            }
        }
        return $rowArr;
    }

    /*
     * Public function getAllId of Users_Addresses_Model class
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
     * Public function softDelete of Users_Addresses_Model class
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