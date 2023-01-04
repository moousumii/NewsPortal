<?php
/**
 * Description of sql_helper
 *
 * This class has some query finction to get data from database.
 * 
 */
class sql{
    private static $ci_obj;
    
    public static function init(){
        if(!isset(self::$ci_obj)){
            self::$ci_obj=& get_instance();
        }
        return self::$ci_obj;
    }

    public static function execute($sql,$insert=FALSE){
        $obj=self::init();
        $query=$obj->db->query($sql);
        if(!$insert){
            return $query->result_array();
        }else{
            return $query;
        }
    }

    public static function row($table,$condition='',$fields='*'){
        $obj=self::init();
        if($condition!=''){
            $condition=" where $condition";
        }
        $sql="select $fields from $table $condition";
        $query=$obj->db->query($sql);
        return $query->row_array();
    }

    public static function rows($table,$condition='',$fields='*'){
        $obj=self::init();
        if($condition!=''){
            $condition=" where $condition";
        }
        $sql="select $fields from $table $condition";
        $query=$obj->db->query($sql);
        return $query->result_array();
    }

    public static function count($table,$condition=''){
        $obj=self::init();
        if($condition!=''){
            $condition=" where $condition";
        }
        $sql="select * from $table $condition";
        $query=$obj->db->query($sql);
        return $query->num_rows();
    }
    
    public static function delete($table,$condition=''){
        $obj=self::init();
        if($condition!=''){
            $condition=" where $condition";
        }
        $sql="delete from $table $condition";
        return $obj->db->query($sql);        
    }

    public static function insert($table,$return_id=FALSE){
        $obj=self::init();
        $fields = $obj->db->list_fields($table);
        $data=array();
        foreach ($fields as $field){
            if(isset($_POST[$field])){
                $data[$field]=$_POST[$field];
            }
        }
        $sql=$obj->db->insert_string($table, $data);
        $query=$obj->db->query($sql);
        
        if($return_id){
            return $obj->db->insert_id();
        }else{
            return $query;
        }
    }

    public static function update($table,$condition){
        $obj=self::init();
        $fields = $obj->db->list_fields($table);
        $data=array();
        foreach ($fields as $field){
            if(isset($_POST[$field])){
                $data[$field]=$_POST[$field];
            }
        }
        $sql=$obj->db->update_string($table, $data, $condition);        
        return $obj->db->query($sql);
    }

    public static function change_status($table, $con, $updateOp) {
        $CI = & get_instance();
        if ($con != '') {
            $sql = "update $table set $updateOp where $con";
            return $CI->db->query($sql);
        }
        else
            return FALSE;
    }
}