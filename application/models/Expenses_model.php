<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Expenses_model extends CI_Model{
     
    function get_category(){
        $query = $this->db->get('category');
        return $query;  
    }
 
    function get_sub_category($category_id){
        $query = $this->db->get_where('sub_category', array('subcategory_category_id' => $category_id));
        return $query;
    }
    function save_expense($category_id,$subcategory_id,$currency,$amount){
        $data = array(
            'expense_category' => $category_id,
            'sub_category' => $subcategory_id,
            'currency' => $currency,
            'amount' => $amount
        );
        $this->db->insert('expenses_table',$data);
    }
    function get_expenses(){
        $this->db->select('*');
        $this->db->from('expenses_table');
        $this->db->join('category','Expense_category = category_id','left');
        $this->db->join('sub_category','sub_category = subcategory_id','left'); 
        $query = $this->db->get();
        return $query;
    }
}