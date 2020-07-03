<?php

/*
  Class Cities_Model
  Extends Designandbuy_Model
  Copyright © 2019 bimsym.com. All rights reserved.
  Author BimSym HRM Development Team
  Version 1.0
  Since CI 3.0 and BymSymHRM 1.0
  Description : This is a Cities_Model model.
 */

class Carts_Model Extends Designandbuy_Model {

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
                'id' => array('caption' => 'ID', 'type' => 'int', 'len' => 11, 'value' => null, 'is_pk' => true, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                $this->getTable() . '_id' => array('caption' => 'ID', 'type' => 'int', 'len' => 11, 'value' => null, 'is_pk' => true, 'in_select' => 1, 'in_insert' => 0, 'modified' => ' ' . $this->getTable() . '.id as ' . $this->getTable() . '_id ',),
                'cart_name' => array('caption' => array('City name', 'City name', 'City name'), 'type' => 'varchar', 'len' => 100, 'value' => null, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'customer_id' => array('caption' => array('Role Of User', 'Role`s Role', 'Role Of User'), 'type' => 'int', 'len' => 4, 'is_fk' => true, 'value' => null, 'table' => 'user_roles', 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'cart_json' => array('caption' => array('Country name', 'Country ', 'Country name'), 'type' => 'varchar', 'len' => 100, 'value' => null, 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 0, ),
                'status' => array('caption' => array('Status', 'Status ', 'Status'), 'type' => 'enum', 'len' => array(1, 0), 'labels' => array('Yes', 'No'), 'rules' => array('is_required' => true), 'in_select' => 1, 'in_insert' => 1),
                'date_time' => array('caption' => array('Created On', 'Created On', 'Created On'), 'type' => 'date', 'len' => 10, 'value' => null, 'rules' => array('is_required' => true, 'regex' => array('server' => 'yyyy:mm:dd', 'client' => 'mm/dd/yyyy')), 'modified' => ' DATE_FORMAT( ' . $this->getTable() . '.date_time, "%m/%d/%Y ") as date_time ', 'in_select' => 1, 'in_insert' => 0)
            ),
            'join_tables' => array(
                0 => array('customers', 'customers.id = ' . $this->getTable() . '.customer_id ', 'left'),
            ),
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
                if (isset($flds['in_insert']) && $flds['in_insert'] == 1) {
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

    public function getAll($page = null, $limit = null, $obArr = array()) {
        $this->page = $page;
        $this->limit = $limit;
        $this->orderby['order_by'] = (!empty($obArr) && isset($obArr['sort_by'])) ? $obArr['sort_by'] : $this->getTable() . '.id';
        $this->orderby['order_type'] = (!empty($obArr) && isset($obArr['order_type'])) ? $obArr['order_type'] : ' ASC ';
        $rows = $this->getAllRecords();
        return $rows;
    }

    public function getById($id) {
        $row = $this->getEntityById($id);
        return $row;
    }

      public function save_record($id, $data = array()) {
        $this->id = $id;
	   $this->data =  $data;	
	   return $this->save();
    }

    public function getAllWithKeyValue( $obArr=array() ) {
		$this->page = null;
		$this->limit = null;
		$this->orderby['order_by'] = (!empty($obArr) && isset($obArr['sort_by'])) ? $obArr['sort_by'] : $this->getTable() . "." .$this->inflect->singularize($this->getTable()).'_name';
		$this->orderby['order_type'] = (!empty($obArr) && isset($obArr['order_type'])) ? $obArr['order_type'] : ' ASC ';
		$rows = $this->getAllRecords();
		$rowArr = array();
		if (!empty($rows) && count($rows) > 0) {
			foreach ($rows as $row) {
				$fld_name = $this->inflect->singularize($this->getTable()) . '_name';
				$rowArr[$row['id']] = $row[$fld_name];
			}
		}
		return $rowArr;
    }

    public function delete_item($id) {
        $tbl = $this->getTable();
        $this->db->ci_where('id', $id);
        if ($this->db->delete($tbl)) {
            return true;
        } else {
            return false;
        }
        ;
    }

}
