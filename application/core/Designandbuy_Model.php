<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Vect_Model extends CI_Model {
    /*
      private $pdo
	 Will be used to implement PDO to execute SQL operations  
     */
    private $pdo = null;
    /*
      protected $table Database table name being instanced
     */
    private $table;
    /*
      private $fields Columns/fields of the table being instanced
     */
    public $fields;
    /*
      private $joins column name and tables being joined
     */
    public $joins;
    /*
      private $pk Primary key of table
     */
    private $pk;
    /*
      Protected $soft_deletes checks is tables record is/are cared with soft delete or not
     */
    private $soft_deletes = false;
    /*
      Private $has_many
     */
    private $has_many;
    /*
      Private $has_one
     */
    private $has_one;
    /*
      Private $is_validated
     */
    private $is_validated = false;
    /*
      private $table_alias
     */
    private $table_alias;
    /*
      protected $query
     */
    protected $query;
    /*
      protected $columns
     */
    
    public $columns;
    /*
     protected $where
     $this->load->model( ‘books_model’ );
     $this->books_model->where[‘column_name’] = ‘Value’
     Generates : " WHERE column_name = ‘Value’ "
     Test Case :
     Getting Books of specific Author
     $this->load->model( ‘books_model’ );
     $this->books_model->where[‘author’] = ‘Hamilton’;
     Above will generate 
     "SELECT * FROM books WHERE books.author = ‘Hamilton’ " ;
     */
    
    public $ci_where = array();
    /*
     protected $or_where
     $this->load->model( ‘books_model’ ); 
     $this->books_model->ci_where[‘author’] = ‘Hamilton’
     $this->books_model->ci_or_where[‘publication_year’] = ‘1990’
     Generates : " WHERE books.author = 'Hamilton' OR  books.publication_year = 1990 "
    */
    
    public $ci_or_where = array();
    /*
     protected $where_in
     $this->load->model( ‘books_model’ );
     $this->books_model->where_in[‘column_name’] = array('value_1','value_2', 'value_3')
     Generates : " WHERE column_name IN ('value_1','value_2', 'value_3')"
     Test Case :
     Getting Books of specific Author
     $this->load->model( ‘books_model’ );
     $this->books_model->$where_in[‘author’] = array('Hamilton','Shakespear', 'R K Narayan')
     Above will generate 
     "SELECT * FROM books WHERE books.author IN ('Hamilton','Shakespear', 'R K Narayan') ";
    */
    public $ci_where_in = array('column'=>'','values'=>array());
    
     /*
     protected $where_not_in
     $this->load->model( ‘books_model’ );
     $this->books_model->where_not_in[‘column_name’] = array('value_1','value_2', 'value_3')
     Generates : " WHERE column_name NOT IN ('value_1','value_2', 'value_3')"
     Test Case :
     Getting Books of specific Author
     $this->load->model( ‘books_model’ );
     $this->books_model->where_not_in[‘author’] = array('Hamilton','Shakespear', 'R K Narayan')
     Above will generate 
     "SELECT * FROM books WHERE books.author NOT IN ('Hamilton','Shakespear', 'R K Narayan') ";
    */
    public $ci_where_not_in = array();
    
     /*
     protected $or_where_in
     $this->load->model( ‘books_model’ );
     $this->books_model->or_where_in[‘column_name’] = array('value_1','value_2', 'value_3')
     Generates : " OR column_name IN ('value_1','value_2', 'value_3')"
     Test Case :
     Getting Books of specific Author
     $this->load->model( ‘books_model’ );
     $this->books_model->where[‘publication_year’] = ‘1990’
     $this->books_model->or_where_in[‘author’] = array('Hamilton','Shakespear', 'R K Narayan')
     Above will generate 
     "SELECT * FROM books WHERE books.publication_year = 1990 OR books.author IN ('Hamilton','Shakespear', 'R K Narayan') ";
    */
    
    public $ci_or_where_in = array();
    
     /*
     protected $or_where_not_in
     $this->load->model( ‘books_model’ );
     $this->books_model->or_where_in[‘column_name’] = array('value_1','value_2', 'value_3')
     Generates : " OR column_name NOT IN ('value_1','value_2', 'value_3')"
     Test Case :
     Getting Books of specific Author
     $this->load->model( ‘books_model’ );
     $this->books_model->where[‘publication_year’] = ‘1990’
     $this->books_model->$or_where_not_in[‘author’] = array('Hamilton','Shakespear', 'R K Narayan')
     Above will generate 
     "SELECT * FROM books WHERE books.publication_year = 1990 OR books.author NOT IN ('Hamilton','Shakespear', 'R K Narayan') ";
    */
    
    public $ci_or_where_not_in = array();
    
    /*
     * public $group_start
     * @type  = boolean
     * Usage   
     * $this->load->model( ‘books_model’);
     * $this->books_model->where_group_start = true;
     */
    public $group_start = false;
    
    /*
     * public $group_end
     * @type  = boolean
     * Usage   
     * $this->load->model( ‘books_model’);
     * $this->books_model->where_group_end = true;
     */
    public $group_end = false;
    
     /*
     * public $or_group_start
     * @type  = boolean
     * Usage   
     * $this->load->model( ‘books_model’);
     * $this->books_model->or_where_group_start = true;
     */
    public $or_group_start = false;
    
    /*
     * public $or_group_end
     * @type  = boolean
     * Usage   
     * $this->load->model( ‘books_model’);
     * $this->books_model->or_where_group_end = true;
     */
    public $or_group_end = false;
    
     /*
     protected $where_group
     $this->load->model( ‘books_model’ );
     $this->books_model->where[‘publication_year’] = ‘1990’;
     $this->books_model->group_where[‘author’] = Hamilton
     $this->books_model->group_where[‘price’] > 200
     Generates : “WHERE `books.publication_year`  = 1990 AND  ( `author` = ‘Hamilton’ AND `price` >  200 ) 
    */
    public $ci_where_group = array();
   
    
    /*
     protected $or_where_group
     $this->load->model( ‘books_model’ );
     $this->books_model->where[‘publication_year’] = ‘1990’;
     $this->books_model->or_where_group[‘author’] = Hamilton
     $this->books_model->or_where_group[‘price’] > 200
     Generates : “WHERE `books.publication_year`  = 1990 AND  ( `author` = ‘Hamilton’ OR `price` >  200 ) 
    */
    
    public $ci_or_where_group = array();
    
    
    /*
     protected $where_group_in
     $this->load->model( ‘books_model’ );
     $this->books_model->where[‘publication_year’] = ‘1990’;
     $this->books_model->group_where[‘author’] = Hamilton
     $this->books_model->group_where[‘price’] > 200
     Generates : “WHERE `books.publication_year`  = 1990 AND  ( `author` = ‘Hamilton’ AND `price` >  200 ) 
    */
    public $ci_where_group_in = array();
   
    
    /*
     protected $or_where_group_in
     $this->load->model( ‘books_model’ );
     $this->books_model->where[‘publication_year’] = ‘1990’;
     $this->books_model->or_where_group_in[‘author’] =  array('Hamilton','Shakespear', 'R K Narayan')
     $this->books_model->or_where_group_in[‘price’] = array('200','500', '700')
     Generates : “WHERE `books.publication_year`  = 1990  OR  ( `author`  IN ('Hamilton','Shakespear', 'R K Narayan') AND `price`  IN ('200','500', '700') ) 
    */
    public $or_where_group_in = array();
    
    
    /*
    protected $where_like
    $this->load->model( ‘books_model’ );
     $this->books_model->where_like[‘publication_year’] = ‘199’;
     Generates "WHERE books.publication_year LIKE '%199%' "
     */
    public $ci_where_like = array();
    
    
    /*
      protected $where_not_like
      $this->load->model( ‘books_model’ );
      $this->books_model->where_not_like[‘publication_year’] = ‘199’;
      Generates "WHERE books.publication_year NOT LIKE '%199%' "
    
    */
    public $ci_where_not_like = array();
    
    /*
    protected $where_like
    $this->load->model( ‘books_model’ );
     $this->books_model->where[‘author’] = ‘Congreve’;
     $this->books_model->where_or_like[‘publication_year’] = ‘199’;
     Generates "WHERE books.author = 'Congreve' OR books.publication_year LIKE '%199%' "
     */
    public $ci_where_or_like = array();
    
    
    /*
     protected $where_not_like
     $this->load->model( ‘books_model’ );
     $this->books_model->where[‘author’] = ‘Congreve’;
     $this->books_model->where_or_not_like[‘publication_year’] = ‘199’;
     Generates "WHERE books.author = 'Congreve' OR books.publication_year NOT LIKE '%199%' "
    */
    public $ci_where_or_not_like = array();
    
     /*
      protected $having
      $this->load->model( ‘books_model’ );
      $this->books_model->having[‘publication_year’] = ‘1990’;
      Generates "HAVING books.publication_year = '1990' "
    */
   public $having = array();
    /*
      protected $page
     */
    public $page;
    /*
      protected $limit
     */
    public $limit;
    /*
      protected $grouby
     */
    protected $groupby;
    /*
      protected $orderby
     */
    public $orderby;
    /*
      private  $is_row_array
     */
    public $is_row_array;
    /*
      private $table_property
     */
    public $table_property;
    public $last_insert_id;
    public $group_by = array();
    public $ids = array();
    public $keep_query_active = true;
     /*
     * public $total_records
     * IF you want to unset active query with parameters and conditions after getting count of result set $keep_query_active to FALSE  
     * Usage
     * $this->load->model('books_model');
     * $this->keep_query_active = true;
     * $this->books_model->where[‘author’] = ‘Hamilton’;
     * $this->books_model->or_where[‘publication_year’] = ‘1990’;
     * $this->total_records = $this->db->count_all_results($this->table, $this->keep_query_active);
    */	
    public $total_records = 0;
    public $total_pages;
    public $db_error;
    public $id;
    public $data = array();
    public $is_object=false;
    public $batch_insert = false;
    public $table_properties;
    public $count_all_records;
    public $nested_query = false;
    public $ci_where_in_column;	
    public $ci_where_in_values;	
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
	public function setTable($tbl) {
		if (!$this->table):
			$this->table = $tbl;
		endif;
	}
	public function setTableColumns($tbl = '') {
		$flds = $this->db->field_data($tbl);
		if (!empty($flds)):
			foreach ($flds as $key => $val):
				$this->table_property[$val->name] = (array) $val;
			endforeach;
		 endif;
	}
	public function getTable() {
		return $this->table;
	}
	public function getTableColumns() {
		return $this->table_property;
	}
    public function getView() {
        return $this->table;
    }
	/*
	* Public Function getAllRecords
	* Version 1.0
	* Since BIMHRM Version 1.0
	* Author BimSymHRM Development Team
	* return (array)
	* Usage  :
	* $this->load->model( ‘books_model’ ); 
     * $this->books_model->where[‘author’] = ‘Hamilton’;
     * $this->books_model->or_where[‘publication_year’] = ‘1990’;
	* $rows = $this->books_model->getAll([page], [limit], [orderby[sort_by][order_type]]);
	* Models getAll method calls getAllRecords of Vect_Model class
	*/
    public function getAllRecords() {
        $cols =	(count($this->fields) > 0) ? $cols = implode(',',$this->fields) : '*';
	   $this->columns = $cols;
	   $this->is_row_array = false;
	   $rec = $this->executeSelectQuery();
	   $this->getTotalRecords();	
	   $this->getTotalPages();	
        return $rec;
    }
	/*
	* protected Function executeSelectQuery
	* Version 1.0
	* Since BIMHRM Version 1.0
	* Author BimSymHRM Development Team
	* return array of record sets
	* Usage  :
	* Models Vect_Model getAllRecords method calls executeSelectQuery of Vect_Model class
	*/	
    protected function executeSelectQuery() {
		if(isset($this->columns) && !empty($this->columns)){
				$this->db->select($this->columns);
		}else{
				$this->db->select('*');
		}
		
		$this->db->from($this->table);
		if (!empty($this->joins)):
			foreach ($this->joins as $join):
				$this->db->join($join[0], $join[1], $join[2]);
			endforeach;
		endif;
		if($this->nested_query == true):
			if (isset($this->group_start) && $this->group_start === true):
				$this->db->group_start();
					if (isset($this->ci_where)): $this->db->where($this->ci_where); endif;
                    if (isset($this->or_group_start) && $this->or_group_start === true):
                       $this->db->or_group_start();
                          if (isset($this->ci_or_where_group)): $this->db->where($this->ci_or_where_group);  endif; 
                       $this->db->group_end();
                    endif;
                    $this->db->group_end();
                endif;
		endif;
		 if($this->nested_query == false):     
			if (isset($this->ci_where)): $this->db->where($this->ci_where); endif;
			
			if (isset($this->ci_where_in_column)): 
				$this->db->where_in($this->ci_where_in_column, $this->ci_where_in_values); 
				endif;
			
			if (isset($this->ci_or_where)): $this->db->or_where($this->ci_or_where); endif;	
				
			if (isset($this->ci_where_like)): $this->db->like($this->ci_where_like); endif;
			
			if (isset($this->ci_where_or_like)): $this->db->or_like($this->ci_where_or_like); endif;
			
			if (isset($this->ci_where_not_like)): $this->db->not_like($this->ci_where_not_like); endif;
		endif;
		
		if (isset($this->group_by) && !empty($this->group_by)):
			$this->db->group_by($this->group_by);
		endif;
		// Getting total records before setting limit and offset 
		//$query = $this->db->get();
		//$this->total_records = count( $query->result_array());
		if (!empty($this->orderby) && isset($this->orderby['order_by']) && isset($this->orderby['order_type'])):
			$this->db->order_by($this->orderby['order_by'], $this->orderby['order_type']);
		endif;
		if ( isset($this->limit) && ($this->limit != null || $this->limit != '') ):
			$offset = ($this->page - 1) * $this->limit;
			$this->db->limit($this->limit, $offset);
		endif;
		$query = $this->db->get();
		return $this->is_row_array ? $query->row_array() : $query->result_array();
    }
	/*
	* protected Function getTotalRecords
	* Version 1.0
	* Since BIMHRM Version 1.0
	* Author BimSymHRM Development Team
	* return array of record sets
	* Usage  :
	* Used to get count of total records of active select query
	* Sets $this->total_records of model's property	
	*/
	protected function getTotalRecords(){
		$this->db->select($this->columns);
		$this->db->from($this->table);
		if(!empty($this->joins)):
			foreach($this->joins as $join):
				$this->db->join($join[0], $join[1], $join[2]);
			endforeach;
		endif;
		if(isset($this->ci_where)):       
			$this->db->where($this->ci_where);
		endif;
		if(!empty($this->orderby) && count($this->orderby) > 0 ):
			$this->db->order_by( $this->orderby['order_by'], $this->orderby['order_type']);
		endif;
		$this->total_records = $this->db->count_all_results();
	}
	/*
	* protected Function getTotalRecords
	* Version 1.0
	* Since BIMHRM Version 1.0
	* Author BimSymHRM Development Team
	* return array of record sets
	* Usage  :
	* Used to get count of total pages by total count and limit of active select query
	* Sets $this->total_pages of model's property	
	*/
	protected function getTotalPages() {
        if ($this->total_records > 0):
			if(isset($this->limit) && $this->limit != ''):
				$this->total_pages = ceil($this->total_records / $this->limit);
			endif;
	   endif;
    }
    /*
	* public Function getGroupByData
	* Version 1.0
	* Since BIMHRM Version 1.0
	* Author BimSymHRM Development Team
	* return array of record sets
	* Usage  :
	* Used to get count of total pages by total count and limit of active select query
	* Sets $this->total_pages of model's property	
	*/	
    public function getGroupByData($page = '', $limit = '', $colsArr = array(), $joinsArr = array(), $condArry = array(), $obArry = array(), $row_arr = false) {
		if(empty($this->fields)):
			$cols = '*';
		endif;
		if(count($this->fields) > 0):
			$cols = implode(',',$this->fields);

		endif;
		$this->columns = $cols;
		$this->orderby = $obArry;
		$this->is_row_array = $row_arr;
		$rec = $this->executeSelectQuery();
		return $rec;
    }
    /*
     * public function save
     * Version 1.0
     * Since Application version 1.0
     * CI Version 3.0
     * Author BimSym Tech Support
     * Usage : Insert or Update records(s) in a table. Sets $last_insert_id of Active record 
     * @param $table (String) Active table name to insert or update data in
     * @param $id (integer)
     * @param $data (mixed) array or object
     * @param $is_object (boolean) set true if inserting $data is an object or default false if inserting $data is an array
     * @param $batch_insert (boolean) set true if multiple rows are inserting with $data. Default sets false and considered for single row only 
     * @return (boolean) TRUE on success or FALSE on failure 
    */
    public function save(){
        if (( is_array($this->data) && $this->is_object == true ) || ( is_object($this->data) && $this->is_object == false)):
            $this->db_error = "Record could not be saved in " . $this->table . ". Please check query.";
            return false;
        endif;
        if (is_object($this->data) && $this->is_object == true && $this->batch_insert == true) :
            $this->db_error = "Record could not be saved in " . $this->table . ". Please check query.";
            return false;
         endif;
		
        if ($this->id == 0):
		  if (is_array($this->data) && $this->is_object == false):
				//echo "<pre>"; print_r($this->data); echo "<pre>";exit;
				$this->db->insert($this->table, $this->data);
				$this->last_insert_id = $this->db->insert_id();
				return true;
             endif;
		  	 
            if (is_object($this->data) && $this->is_object == true) :
				$this->db->insert($this->table, $this->data);
				$this->last_insert_id = $this->db->insert_id();
				return true;
             endif;
	    endif;
        if ($this->id > 0):
            if (is_array($this->data) && $this->is_object == false):
			 $this->db->set($this->data);
                $this->db->where('id', $this->id);
                $this->db->update($this->table); 
                $this->last_insert_id =  $this->id;
                return true;
             endif;
            if ( is_object($this->data) && $this->is_object == true && $this->batch_insert == false ):
                $this->db->set($this->data);
                $this->db->where('id', $this->id);
                $this->db->update($this->table); 
                $this->last_insert_id =  $this->id;
                return true;
             endif;
        endif;
    }
    public function getEntityById($id) {
		$rec = array();
		$cols =	(count($this->fields) > 0) ? $cols = implode(',',$this->fields) : '*';
		$this->columns = $cols;	
		$this->ci_where[$this->table.'.id'] = $id;
		$this->is_row_array = true;
		$rec = $this->executeSelectQuery();
		return $rec;
    }
    public function getNewOrderId($table_name) {
        $this->db->select_max('id');
        $res1 = $this->db->get($table_name);
    
        if ($res1->num_rows() > 0)
        {
            $res2 = $res1->result_array();
            $next =   ($res2[0]['id'] + 1);
        }else{
          $next =  1;
        }
        $year = date('Y');
        $month = date('M');
        $next = 'MJ'.$year.strtoupper($month).'00000'.$next;
        return $next;
    }
    
    public function delete_row($tbl, $col, $id) {   
      $this->db->where($col, $id);
      if($this->db->delete($tbl)) return true; else return false;
    }

}
