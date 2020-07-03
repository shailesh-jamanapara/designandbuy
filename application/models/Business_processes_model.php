<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Business_Processes_Model Extends Vect_Model {

    public $model;
    public $table_properties;
    public $id;
    public $fields = array();
    // $fields_pro Fields  property 
    public $fields_pro = array();
    public $fields_insert = array();
    public $ci_where = array();
    public $join_tables;
    public $last_insert_id;

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
        $this->setTable(strtolower($this->model));
        $this->setTableProperties();
        $this->setCols();
        $this->setJoins();
        }
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
                $this->getTable().'_id' => array(
                    'caption' => 'ID',		
                    'type'=>'int',
                    'len' =>11,
                    'value' => null,
                    'is_pk' => true,
                    'rules' => array('is_required'=>true ),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => ' '.$this->getTable().'.id as '.$this->getTable().'_id ',
                ),
				'user_id' => array(
                    'caption' => 'ID',
                    'type' => 'int',
                    'len' => 11,
                    'value' => null,
                    'is_pk' => true,
                    'in_select' => 1,
                    'in_insert' => 1,
                    //'modified' => ' users.id as ID ',
                ),
                'first_name' => array(
                    'caption' => array('First Name', ' First Name ', 'First name should consist of alpha, dot and white space only'),
                    'type' => 'varchar',
                    'len' => 50,
                    'value' => null,
                    'rules' => array('is_required' => true, 'regex' => array('server' => '/[^a-zA-Z.\ ]', 'client' => '^[a-zA-Z\.]+$', 'message' => 'Allows Characters(a-z A-Z), dot(.) & Space only ')),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'help' => 'Max. 50 Characters',
                    'modified' => ' users.first_name as first_name',
                ),	
                'last_name' => array(
                    'caption' => array('Last Name', ' Last Name ', 'Last name should consist of alpha, dot and white space only'),
                    'type' => 'varchar',
                    'len' => 50,
                    'value' => null,
                    'rules' => array('is_required' => true, 'regex' => array('server' => '/[^a-zA-Z.\ ]', 'client' => '^[a-zA-Z\.]+$', 'message' => 'Allows Characters(a-z A-Z), dot(.) & Space only ')),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'help' => 'Max. 50 Characters',
                    'modified' => ' users.last_name as last_name',
                ),
                'email' => array(
                    'caption' => array('Email', ' Your Email ', 'Email ID'),
                    'type' => 'varchar',
                    'len' => 255,
                    'value' => null,
                    'rules' => array('is_required' => true, 'message' => 'Enter Valid Email ID'),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'help' => 'Max. 50 Characters',
                    'modified' => ' users.email as email',
                ),
                'contact_no' => array(
                    'caption' => array('Contact Number', ' Contact Number ', 'Contact Number'),
                    'type' => 'varchar',
                    'len' => 10,
                    'value' => null,
                    'rules' => array('is_required' => true, 'regex' => array('server' => '/[^0-9]', 'client' => '^[0-9]+$', 'message' => 'Allows Numeric Values Only(0-9), dot(.) & Space only')),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'help' => 'Max. 10 Characters',
                    'modified' => ' users_contacts.contact_no as contact_no',
                ),
                'address' => array(
                    'caption' => array('Address', 'Address', 'Address'),
                    'type' => 'varchar',
                    'len' => '500',
                    'value' => null,
                    'rules' => array('is_required' => true, 'regex' => array('server' => '/[^a-zA-Z.\ ]', 'client' => '^[a-zA-Z\.]+$', 'message' => 'Allows Characters(a-z A-Z), dot(.) & Space only')),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'help' => 'Max. 10 Characters',
                    'modified' => ' users_addresses.address as address',
                ),
                'city_id' => array(
                    'caption' => array('City', 'City Name', 'City Id'),
                    'type' => 'varchar',
                    'len' => '500',
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'help' => 'Select City',
                    'modified' => ' users_addresses.city_id as city_id',
                ),	
                'franchisee_url' => array(
                    'caption' => array('Franchisee URL', 'Franchisee URL', 'Franchisee URL'),
                    'type' => 'varchar',
                    'len' => 500,
                    'is_fk' => true,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'effective_date' => array(
                    'caption' => array('Effective Date', 'Effective Date', 'Effective Date'),
                    'type' => 'date',
                    'len' =>  '',
                    'is_fk' => true,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'expiration_date' => array(
                    'caption' => array('Expiration Date', 'Expiration Date', 'Expiration Date'),
                    'type' => 'date',
                    'len' => '',
                    'is_fk' => true,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1,
					//'modified'=>'customers.customer_name as customer_name'
                ),
                'active_status' => array(
                    'caption' => array('Status', ' Active Status ', 'Active Status'),
                    'type' => 'int',
                    'len' => 50,
                    'value' => null,
                    'rules' => array('is_required' => true, 'regex' => array('server' => '/[^a-zA-Z.\ ]', 'client' => '^[a-zA-Z\.]+$', 'message' => 'Allows Characters(a-z A-Z), dot(.) & Space only ')),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'help' => 'Max. 50 Characters',
                    'modified' => ' users.active_status as active_status',
                ),	
                'login_code' => array(
                    'caption' => array('Login Code', 'login Code', 'Login Code'),
                    'type' => 'varchar',
                    'len' => 50,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'help' => 'Max. 50 Characters',
                    'modified' => ' users.username as login_code',
                ),
                'title' => array(
                    'caption' => array('Title', 'Title', 'Title'),
                    'type' => 'varchar',
                    'len' => 50,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'help' => 'Select Prefix',
                    'modified' => ' users.title'
                ),	
            ),
            'join_tables' => array(
                0 => array('users', 'users.id = ' . $this->getTable() . '.user_id AND users.is_archived !=1 ', 'left'),
                1 => array('users_contacts', 'users_contacts.user_id = ' . $this->getTable() . '.user_id AND users_contacts.is_archived !=1 ', 'left'),
                2 => array('users_addresses', 'users_addresses.user_id = ' . $this->getTable() . '.user_id AND users_addresses.is_archived !=1 ', 'left'),
            ),
            'has_many' => array(),
            'has_one' => array(),
            'belongs_to' => array()
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
     * Public function getAll of Users_Model class
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
     * Public function getById of Users_Model class
     * @param integer $id
     * @return array of result
     */

    public function getById($id) {
        return $this->getEntityById($id);
    }

    /*
     * Public function save_record of Users_Trainings_Model class
     * 
     */

     public function save_record($id, $data = array()) {
        $this->id = $id;
	   $this->data =  $data;	
	   return $this->save();
    }

    /*
     * Public function getAllWithKeyValue of Users_Trainings_Model class
     * 
     */

    public function getAllWithKeyValue( $obArr=array() ) {
        $this->page = null;
        $this->limit = null;
        $this->orderby['order_by'] = (!empty($obArr) && isset($obArr['sort_by'])) ? $obArr['sort_by'] : $this->getTable() . '.first_name';
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
                    $rowArr[$row['id']] = $row['first_name'] . "  " . $row['last_name'];
                }
            }
        }
        return $rowArr;
    }

    /*
     * Public function delete_item of Users_Trainings_Model class
     * 
     */

    public function delete_item($id) {
        $tbl = $this->getTable();
        $this->db->ci_where('id', $id);
        if ($this->db->delete($tbl)) {
            return true;
        } else {
            return false;
        }
    }

}
