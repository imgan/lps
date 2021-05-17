<?php

class Model_gr extends CI_model
{
    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function viewOrderingCustom($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function viewOrderingCustomV2()
    {
        return $this->db->query('Select a.*, b.ReqNo as ReqNos, c.PoNo as Ponos from "TxGr" a 
        JOIN TxRequest b on a.ReqNo = b.ReqId
        LEFT JOIN Txpo c on a.PoNo = c.PoId
        ');
    }

    public function viewWhereCustomLop($id)
    {
        return $this->db->query('Select ReqNo from "TxPo" where PoId = '.$id.'');
    }
	public function viewWhere($table, $data)
    {
        $this->db->where($data);
        return $this->db->get($table);
	}
	
	public function checkDuplicate($data, $table)
    {
        $this->db->where('GrNo',$data['GrNo']);
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
