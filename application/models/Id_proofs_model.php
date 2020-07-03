<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Id_Proofs_Model Extends Designandbuy_Model
{
    public $model;
    public $table;
    
    public function init(){
        parent::init();
    }
    
    public function __construct($model = null){
        parent::__construct();
            $cls = get_class($this);
	  $split = explode('_', $cls);
	  if(!empty($split) ){
		$concate = $split[0]; 
		if(count($split) > 0){
			$split = array_reverse($split);		
			unset($split[0]);
			$split = array_reverse($split);	
			$concate = 	implode('_', $split);
		}
		$this->model = strtolower( $concate ); 
	  } 
	 
            $this->setTable(strtolower($this->model)) ;
      
     }
	  public function getAll($page=null, $limit=null, $obArr){
		$obArr['order_by'] = (!empty($obArr) && isset($obArr['sort_by'])) ? $obArr['sort_by'] :  $this->getTable().'.id';
		$obArr['order_type'] = (!empty($obArr) && isset($obArr['order_type'])) ? $obArr['order_type'] :  ' ASC ';
		$rows = $this->getAllRecords($page, $limit, $this->fields, $this->join_tables, $this->ci_where, $obArr);
		return $rows;
    }
      public function getAllWithKeyValue( $obArr=array() ) {
		$this->page = null;
		$this->limit = null;
		$this->orderby['order_by'] = (!empty($obArr) && isset($obArr['sort_by'])) ? $obArr['sort_by'] : $this->getTable() . '.id';
		$this->orderby['order_type'] = (!empty($obArr) && isset($obArr['order_type'])) ? $obArr['order_type'] : ' ASC ';
		$rows = $this->getAllRecords();
		$rowArr = array();
		if(!empty( $rows ) && count( $rows ) > 0){
		foreach($rows as $row){
		$rowArr[$row['id']]= $row['position_title'];  
		}
		}
		return $rowArr;
    }
     public function getById($colsArr=array(), $joinsArr=array(), $condArr=array()){
               // exit('here');
        	$row = $this->getEntityById($colsArr, $joinsArr, $condArr);
		return $row;
    }
	public function save_record($id, $data=array()){
        if(empty($data)){
            return false;
        }
        if($id==0){
            $this->db->insert($this->model, $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
        }
        if($id>0){
            $this->db->update($this->model, $data, 'id='.$id);
             return $id;
        }
    }
    
}