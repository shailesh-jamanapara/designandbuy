<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Users_Model Extends Vect_Model {

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
				'ID' => array(
                    'caption' => 'ID',
                    'type' => 'int',
                    'len' => 11,
                    'value' => null,
                    'is_pk' => true,
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => ' users.id as ID ',
                ),	
                'role_id' => array(
                    'caption' => array('Role Of User', 'Role Of User', 'Role Of User'),
                    'type' => 'int',
                    'len' => 2,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				 'customer_id' => array(
                    'caption' => array('customer_id', 'customer_id', 'customer_id'),
                    'type' => 'int',
                    'len' => 2,
                    'is_fk' => true,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				 'customer_name' => array(
                    'caption' => array('customer_name', 'customer_name', 'customer_name'),
                    'type' => 'int',
                    'len' => 2,
                    'is_fk' => true,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 0,
					'modified'=>'customers.customer_name as customer_name'
                ),
                'role_name' => array(
                    'caption' => array('Role Of User', 'Role Of User', 'Role Of User'),
                    'type' => 'int',
                    'len' => 2,
                    'is_fk' => true,
                    'value' => null,
                    'table' => 'user_roles',
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => ' roles.role_name as role_name'
                ),
                'username' => array(
                    'caption' => array('username', 'username', 'username'),
                    'type' => 'varchar',
                    'len' => 15,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1,
                    'help' => 'Max. 15 Characters',
                    'rules' => array('is_required' => true, 'regex' => array('server' => '/[^a-zA-Z.\ ]', 'client' => '^[A-Z[0-9]]+$', 'message' => 'Allowed only Characters(A-Z) & Numbers(0-10000).')),
                ),
                'password' => array(
                    'caption' => array('Password', 'Password', 'Password'),
                    'type' => 'varchar',
                    'len' => 255,
                    'value' => base64_encode('admin@123'),
                    'rules' => array('is_required' => false),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'title' => array(
                    'caption' => array('Prefix', 'Prefix', 'Prefix is required '),
                    'type' => 'enum',
                    'len' => array('Mr.', 'Miss', 'Mrs'),
                    'value' => null,
                    'len' => array('Mr.', 'Mrs.', 'Miss.'),
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'first_name' => array(
                    'caption' => array('First Name', ' First Name ', 'First name should consist of alpha, dot and white space only'),
                    'type' => 'varchar',
                    'len' => 50,
                    'value' => null,
                    'rules' => array('is_required' => true, 'regex' => array('server' => '/[^a-zA-Z.\ ]', 'client' => '^[a-zA-Z\.]+$', 'message' => 'Allows Characters(a-z A-Z), dot(.) & Space only ')),
                    'in_select' => 1,
                    'in_insert' => 1,
                    'help' => 'Max. 50 Characters'
                ),
                'middle_name' => array(
                    'caption' => array('Middle Name', 'Middle Name', 'Middle Name of '),
                    'type' => 'varchar',
                    'len' => 50,
                    'value' => null,
                    'rules' => array('is_required' => true, 'regex' => array('server' => '/[^a-zA-Z.\ ]', 'client' => '^[a-zA-Z\.]+$', 'message' => 'Allows Characters(a-z A-Z), dot(.) & Space only ')),
                    'in_select' => 1,
                    'in_insert' => 1,
                    'help' => 'Max. 50 Characters'
                ),
                'last_name' => array(
                    'caption' => array('Last Name', 'Last Name', 'Last Name of Employee'),
                    'type' => 'varchar',
                    'len' => 50,
                    'value' => null,
                    'rules' => array('is_required' => true, 'regex' => array('server' => '/[^a-zA-Z.\ ]', 'client' => '^[a-zA-Z\.]+$', 'message' => 'Allows Characters(a-z A-Z), dot(.) & Space only ')),
                    'in_select' => 1,
                    'in_insert' => 1,
                    'help' => 'Max. 50 Characters'
                ),
                'email' => array(
                    'caption' => array('Email', 'Email', 'Email'),
                    'type' => 'email',
                    'len' => 100,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1,
                    'rules' => array('is_required' => true, 'regex' => array('client' => '^[a-zA-Z0-9@-_\.]+$')),
                    'help' => 'Max. 100 Characters'
                ),
				 'department_id' => array(
                    'caption' => array('department_id', 'department_id', 'department_id'),
                    'type' => 'text',
                    'len' => 2,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1,
                    'rules' => array('is_required' => true, 'regex' => array('client' => '^[0-9]+$')),
                    'help' => 'Max. 100 Characters'
                ),
				'designation' => array(
                    'caption' => array('designation', 'designation', 'designation'),
                    'type' => 'designation',
                    'len' => 100,
                    'value' => null,
                    'in_select' => 1,
                    'in_insert' => 1,
                    'rules' => array('is_required' => true, 'regex' => array('client' => '^[a-zA-Z0-9@-_\.]+$')),
                    'help' => 'Max. 100 Characters'
                ),
                'active_status' => array(
                    'caption' => array('Status ', 'Status', 'Status of Employee'),
                    'type' => 'enum',
                    'len' => array('1', '0'),
                    'value' => '0',
                    'labels' => array('Active', 'Inactive'),
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'created_at' => array(
                    'caption' => array('Created  On', 'Created On', 'Created On'),
                    'type' => 'timestamp',
                    'len' => 'yyyy:mm:dd',
                    'value' => null,
                    'rules' => array('is_required' => true, 'regex' => array('server' => 'yyyy:mm:dd h:i:s', 'client' => 'mm/dd/yyyy')),
                    'modified' => ' DATE_FORMAT(  ' . $this->getTable() . '.created_at, "%m/%d/%Y ") as created_at ',
                    'in_select' => 1,
                    'in_insert' => 1
                ),
				'created_by' => array(
                    'caption' => array('created_by', 'created by', 'created by'),
                    'type' => 'int',
                    'len' => 10,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'updated_on' => array(
                    'caption' => array('Updated On', 'Updated On', 'Updated On'),
                    'type' => 'timestamp',
                    'len' => 'yyyy:mm:dd',
                    'value' => null,
                    'rules' => array('is_required' => true, 'regex' => array('server' => 'yyyy:mm:dd h:i:s', 'client' => 'mm/dd/yyyy')),
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
                    'caption' => array('Is Archived', 'Is Archived ', 'Is Archived '),
                    'type' => 'enum',
                    'len' => array('1', '0'),
                    'labels' => array('Yes', 'No'),
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
                'token' => array(
                    'caption' => array('Is Archived', 'Is Archived ', 'Is Archived '),
                    'type' => 'varchar',
                    'len' => 100,
                    'value' => '',
                    'labels' => array('Yes', 'No'),
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 1
                ),
            ),
            'cross_fields' => array(
                'department_name' => array(
                    'caption' => array('Department Name', 'Department Name', 'Department of Employee'),
                    'type' => 'varchar',
                    'len' => 12,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => ' departments.department_name as department_name'
                ),
                'user_role' => array(
                    'caption' => array('User`s Skills', 'User`s Skills', 'User`s Skills'),
                    'type' => 'varchar',
                    'len' => 250,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => " IF(roles.role_name !='', roles.role_name , 'NA') as user_role "
                ),
                'users_address' => array(
                    'caption' => array('users_address', 'users_address', 'users_address'),
                    'type' => 'varchar',
                    'len' => 250,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => " IF(ua.address !='', ua.address , 'NA') as users_address "
                ),
                'avatar' => array(
                    'caption' => array('temp_address', 'temp_address', 'temp_address'),
                    'type' => 'varchar',
                    'len' => 250,
                    'value' => null,
                    'rules' => array('is_required' => true),
                    'in_select' => 1,
                    'in_insert' => 0,
                    'modified' => " IF(users_photos.fullpath !='', users_photos.fullpath  , 'Images/BranchUserImage/user2.jpg') as avatar "
                )
            ),
            'join_tables' => array(
                0 => array('users_contacts', 'users_contacts.user_id = ' . $this->getTable() . '.id AND users_contacts.is_archived !=1 ', 'left'),
                1 => array('departments', 'departments.id = users.department_id', 'left'),
                2 => array('roles', 'roles.id =' . $this->getTable() . '.role_id', 'left'),
                3 => array('users_addresses ua', 'ua.user_id =' . $this->getTable() . '.id AND ua.is_archived !=1 ', 'left'),
                4 => array('users_photos ', 'users_photos.user_id =' . $this->getTable() . '.id AND users_photos.is_archived !=1 ', 'left'),
                5 => array('customers ', 'customers.id =' . $this->getTable() . '.customer_id ', 'left')
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
        $this->orderby['order_by'] = (!empty($obArr) && isset($obArr['sort_by'])) ? $obArr['sort_by'] : $this->getTable() . '.username';
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
