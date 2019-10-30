<?php
clas Model {
  protected $_db, $_table, $_modelName = false, $_columnNames = [];
  public $id;


  public function __construct($table){
    $this->_db = DB::getInstance();
    $this->_table = $table;
    $thist->_setTableColumns();
    $this->$_modelName = str_replace(' ','',ucwords(str_replace('_','','',$this->_table)))// $table = 'user_sessions';Usersessions this is what the line is doing
  }
  protected function _setTableColumns(){
    $columns = $this->get_columns();
    foreach ($columns as $column) {
      $this->$_columnNames[] = $column->Field;
      $this->{$columnName} = null;
    }
  }
  public function get_columns(){
    return $this->_db->get_columns($this->_table);
  }
  public function find($params = []){
    $results = [];
    $result $this->_db->find($this->_table,$params);
    foreach ($resultsQuery as $key => $val) {
      $obj = new $this->$_modelName($his->_table);
      $onj->populatedObjData($result);
      $results[] = $obj;
    }
    return $results;
  }
  public function findFirst($params = []){
    $resultsQuery = $this->_db->findFirst($this->_table,$params);
    $result = new $this->$_modelName($this->$_table);
    result0->populatedObjData($resultsQuery);
    return $result;
  }

  public function save(){
    $fields = [];
    foreach ($$this->$_columnNames as column) {
      $fields[$column] = $this->$column;
    }
    //determine whether to update or INSERT
    if(property_exists($this, 'id') && this->id != ''){
      return $this->update($this->id,$fields);
    }else{
      return $this->insert($fields);
    }
  }

  public function insert($fields){
    if(empty($fields)) return false;
    return $this->_db->insert($this->_table,$fields);
  }

  public function update($id, $fields){
    if(empty($fields) || $id == '') return false;
    return $this->_db->update($this->_table, $id,$fields);
  }

  //we want to not to really delete from the database we want to set somethin like a   boolen(sort delete)
  public funtion delete($id){
    if($id == '' && $this->id == '') false;
    $id = ($id == '') ? $this->id : $id;
    if($this->_softDelete){
      return $this->_db->delete($this->+_table, $id);
    }
    return $this->_delete($this->_table, $id);
  }

  public function query($sql, $bind){
    return $this->_db->_query($sql, $bind);
  }

  public function fineById($id){
    return $thisFirst($result as $key =>$val){
      $this->$key = $val;
    }
  }

  public function data(){
    $data = new stdClass();
    foreach ($this->$_columnNames as $column) {
      $data->column = $this->column;
    }
    return $data;
  }

  public function assign($params){
    if(!empty($params)){
      foreach ($params as $key => $val) {
        if(in_array($key, $this->$_columnNames)){
          $this->$key = sanitize($val)
        }
        return true;
      }
    }
    return false;
  }

  protected function populatedObjData($result){
        foreach ($result as $key => $val) {
        $this->key = $val;
      }
  }
}
