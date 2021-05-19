<?php

class Model_request extends CI_model
{
    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function checkDuplicateEWF($data, $table)
    {
        $this->db->where('EwfNo',$data['EwfNo']);
        return $this->db->get($table)->num_rows();
    }
    
    public function viewOrderingCustom()
    {
        $Nik = $this->session->userdata('Nik');
        if($this->session->userdata('Level') == 2){
            return $this->db->query('Select *,b.Name as DepartmentName , c.Username from "TxRequest" a 
            JOIN Department b on a.Department = b.Id 
            JOIN Users c on a.CreatedBy = c.Nik 
            WHERE a.CreatedBy = '.$Nik.'');
        } else {
            return $this->db->query('Select *,b.Name as DepartmentName , c.Username from "TxRequest" a 
            JOIN Department b on a.Department = b.Id 
            JOIN Users c on a.CreatedBy = c.Nik
            ');
        }
    }

	public function viewWhere($table, $data)
    {
        $this->db->where($data);
        return $this->db->get($table);
	}
	
	public function checkDuplicate($data, $table)
    {
        $this->db->where('ReqNo',$data['ReqNo']);
        return $this->db->get($table)->num_rows();
    }

    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function view_where($table, $data)
    {
        $this->db->where($data);
        return $this->db->get($table);
	}
	
    public function insert($data, $table)
    {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    function delete($where, $table)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    function truncate($table)
    {
        $this->db->truncate($table);
    }
}
