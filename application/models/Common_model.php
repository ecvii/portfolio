<?php 
	
	class Common_model extends CI_Model {
		
		public function __construct() { 
			
		} 
		
		 // get single record function
		 function single_record($table, $where_cond, $order_by, $limit) {        
		
			$this->db->select('*');
             $this->db->from($table);
           
            if($where_cond!="")
                $this->db->where($where_cond);
            if($limit!="")
                $this->db->limit($limit);
            if($order_by!="")
                $this->db->order_by($order_by);
            
			 $query = $this->db->get();
			
			
			 if($query->num_rows() == 1) {                 
				return $query->row();
			 }
			 else {
				 return false;
			 }
		 }

		 // get multiple record function
		 function multiple_record($table, $where_cond, $order_by, $limit) {        
		
			$this->db->select('*');
             $this->db->from($table);
           
            if($where_cond!="")
                $this->db->where($where_cond);
            if($limit!="")
                $this->db->limit($limit);
            if($order_by!="")
                $this->db->order_by($order_by);
            
			 $query = $this->db->get();
			
			
			         
				return $query;
			 
				 return false;
			 
		 }

		  // insert record function
		function insert($table,$data) {

			$this->db->insert($table,$data);        
			return $this->db->insert_id();
		  }
		  
		   // update record function
		function update($table, $data, $cond ) {
			
			$this->db->where($cond);
			$this->db->update($table,$data);

			//echo  $this->db->last_query();
			
		} 

		// delete record function
		function delete($table, $cond ) {			
			
			$this->db->where($cond);
			$this->db->delete($table);
		} 
		
		 // get multiple record function
		 function count_records($table, $where_cond) {        
		
			$this->db->select('*');
             $this->db->from($table);
           
            if($where_cond!="")
                $this->db->where($where_cond);
                       
			 $query = $this->db->get();
			
						         
			return $query->num_rows();
			 
				 return false;
			 
		 }
	 		
	}