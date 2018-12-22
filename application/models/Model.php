<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database('panel');
	}


// to check for login username and password in the respective table.

	function get_rows($table,$arr = array())
	{
		$n=$arr['email'];
		$p=$arr['password'];
		$sql="select * from $table where username = '$n' and password = '$p' and user_status = 1";  

		$r = $this->db->query($sql);
		$row=$r->row_array();

		if($row!=NULL)			// if entries are found in the respective table.
			return $row;
		else
			return 0;  
	}


// to add data to table.
	
	function add($table,$data)
	{  
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;			// the entered data id.
	}


// to get all the contents of the table in the form of array[(row objects containing column values)]

	function view($table)
	{
		$query = $this->db->get($table);  
            	return $query->result(); 
	}

// count no. of rows in a table
	function view_count($table)
	{
		$query = $this->db->get($table);
            	return $query->num_rows();
	}


// to update a table with new content where given id matches table id(as pr_id or other id names in table).

	function update($table,$id="",$data="",$table_id="id")
	{
    		$this->db->where($table_id, $id);
    		$this->db->update($table, $data);
	}


// to get the data from the table where given id matches the table id.
// If id name for id inside table is pr_id than it returns only one row.
// Else it returns the entire set of rows with the matching id.  

	function id_view($table,$id,$table_id="id",$order="asc",$column="id")
	{
		$this->db->where($table_id, $id);
		$this->db->order_by($column, $order);
		$q = $this->db->get($table);
		$data = $q->result_array();			// changes array[(objects)] to array[array()]

		if($table_id!="id")
			return $data;				// array[array()]

		if($data)
            		return $data[0];			// array[]

		return NULL;  	
	}

	function id_rand_view($table,$id,$table_id="id")
	{
		$this->db->where($table_id, $id);
		$this->db->order_by('rand()');
		$this->db->limit(30);
		$q = $this->db->get($table);
		$data = $q->result_array();			// changes array[(objects)] to array[array()]

		if($table_id!="id")
			return $data;				// array[array()]

		if($data)
            		return $data[0];			// array[]

		return NULL;  	
	}

// to get a particular column field from the table where the id matches table id. 

	function id_column($table,$column,$id,$table_id="id")
	{	
		$this->db->select($column);
		$this->db->where($table_id,$id);
		$q = $this->db->get($table);
		$data = $q->result_array();

		if($data)
		return($data[0][$column]);
		else
		return;	
	}


// to delete a row from the table where the given id matches table id.

	function delete($table,$id="",$table_id="id")
	{   	
		if($id=="")
		{
			$this->db->empty_table($table);
		}
		else
		{
			$this->db->where($table_id, $id);
			$this->db->delete($table);
		}
	}


// to get a particular file name by id from the table.

	function get_file($table,$id,$pr_file,$pr_id="id")
	{

		$this->db->select($pr_file);
	 	$this->db->from($table);
	 	$this->db->where($pr_id,$id);
		$query = $this->db->get();
		$data = $query->result_array();

		if($data) 
		return $data[0][$pr_file];

		return NULL; 
	}


// to get the previous password of the respective user where given id matches user id in table. 

	function get_previous_password($table,$id)
	{
	 	$this->db->select('password');
	 	$this->db->from($table);
	 	$this->db->where('id',$id);
		$query = $this->db->get();
		$data = $query->result_array();

		if($data)
		return $data[0]['password'];

	    	return NULL;
	}


// to update password for the user.

	function update_password($table,$id,$new)
	{
    		$this->db->set('password', $new, FALSE);
		$this->db->where('id', $id);
		$this->db->update($table);
	}

// attendence function(SPECIFIC)

	function get_attendence($table,$id,$date)
	{
		$sql="select * from $table where pr_employee_id = '$id' and pr_date = '$date'";  

		$r = $this->db->query($sql);
		$row=$r->row_array();

		if($row!=NULL)			// if entries are found in the respective table.
			return $row;
		else
			return 0;  
	}

// attendence function(SPECIFIC)

	function get_all_attendence($table,$id,$year,$month)
	{

		$sql="select * from $table where pr_employee_id = '$id' and pr_date LIKE '%-$month-%' AND pr_date LIKE '%-$year' AND (pr_attendence_status = 1 || pr_attendence_status = 2 || pr_attendence_status = 0)";  

		$r = $this->db->query($sql);
		$row=$r->result_array();

		if($row!=NULL)		// if entries are found in the respective table.
            		return $row;
		else
			return NULL;			
	}

	function count_today($table,$status)
	{
		$date = date("d-m-Y");		

		$sql="select * from $table where pr_date = '$date' AND pr_attendence_status = $status";  

		$query = $this->db->query($sql);
		
		return $query->num_rows();		
	}

	function update_attendence($table,$id,$date,$data)
	{
		$this->db->where('pr_employee_id', $id);
		$this->db->where('pr_date', $date);
    		$this->db->update($table, $data);

	}

	function get_default($table,$id,$column,$value,$table_id="pr_id")
	{
		$sql="select * from $table where $table_id = '$id' and $column = '$value'";  

		$r = $this->db->query($sql);
		$row=$r->result_array();

		if($row!=NULL)		
            		return $row;
		else
			return NULL;			
	}

	function get_two_or_columns($table,$column1="pr_id",$value1,$column2,$value2)
	{
		$sql="select * from $table where ($column1 = $value1 || $column2 = $value2) and (pr_parent_id = 0) order by pr_id desc";  

		$r = $this->db->query($sql);
		$row=$r->result_array();

		if($row!=NULL)		
            		return $row;
		else
			return NULL;			
	}

	function get_last($table,$column,$value,$id="pr_id")
	{
		$sql="SELECT * FROM $table where $column = '$value' ORDER BY $id DESC LIMIT 1";  

		$r = $this->db->query($sql);
		$row=$r->result_array();

		if($row!=NULL)		
            		return $row['0'];
		else
			return NULL;			
	}

	function check_conversation($table,$employee1)
	{
		$employee2=$this->session->user_id;
		$sql="SELECT * FROM $table where (pr_send_to=$employee1 or pr_sent_by=$employee1) and (pr_send_to=$employee2 or pr_sent_by=$employee2)";  

		$r = $this->db->query($sql);
		$row=$r->result_array();

		if($row!=NULL)		
            		return $row['0']['pr_id'];
		else
			return NULL;			
	}
}




