<?php

class Model_lop extends CI_model
{
    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function viewWhereCustomLop($id)
    {
        return $this->db->query('Select ReqNo from "TxRequest" where ReqId = '.$id.'');
    }
    
    public function viewOrderingCustom($table, $order, $ordering)
    {
        $this->db->where('EndedAt !=',  null);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function viewOrderingCustomV2()
    {
        return $this->db->query('Select a.*,b.ReqNo as number from "TxLop" a Join Txrequest b on a.ReqNo = b.ReqId');
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
