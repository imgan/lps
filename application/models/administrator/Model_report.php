<?php

class Model_report extends CI_model
{
    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
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
        $this->db->where('isdeleted !=', 1);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }
	
    public function insert($data, $table)
    {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function getAllStatus($awal, $akhir)
    {
        return $this->db->query('SELECT a.ReqNo,aa.StartedAt as StartReq , aa.EndedAt as EndReq ,
        DATEDIFF(DAY, aa.StartedAt, aa.EndedAt) as Duration1, b.Name , 
        c.BudgetId, c.StartedAt as StartReq2, c.EndedAt as EndedAt2,
        DATEDIFF(DAY, c.StartedAt, c.EndedAt) as Duration2 ,
        d.EwfNo,d.StartedAt as StartRe3 , d.EndedAt as EndReq3 ,
        DATEDIFF(DAY, d.StartedAt, d.EndedAt) as Duration3,
        e.RegId,e.StartedAt as StartReq4 , e.EndedAt as EndReq4 ,
        DATEDIFF(DAY, e.StartedAt, e.EndedAt) as Duration4,
        f.BuyerId,f.StartedAt as StartReq5 , f.EndedAt as EndReq5 ,
        DATEDIFF(DAY, f.StartedAt, f.EndedAt) as Duration5,
        g.LopNo,g.StartedAt as StartReq6 , g.EndedAt as EndReq6 ,
		 DATEDIFF(DAY, g.StartedAt, g.EndedAt) as Duration6,
         h.PrNo,h.StartedAt as StartReq7 , h.EndedAt as EndReq7 ,
		 DATEDIFF(DAY, h.StartedAt, h.EndedAt) as Duration7,
         i.PoNo,i.StartedAt as StartReq8 , i.EndedAt as EndReq8 ,
		 DATEDIFF(DAY, i.StartedAt, i.EndedAt) as Duration8
        from "TxRequest" a 
        JOIN TxQuotation aa on a.ReqId = aa.ReqNo
        JOIN Department b ON a.Department = b.Id
         JOIN TxBudget c ON a.ReqId = c.ReqNo
         JOIN TxEworkflow d ON a.ReqId = d.ReqNo
         JOIN TxRegister e ON a.ReqId = e.ReqNo
         JOIN TxBuyer f ON a.ReqId = f.ReqNo
         JOIN TxLop g on a.ReqId = g.ReqNo
         JOIN TxPr h on a.ReqId = h.ReqNo
         JOIN TxPo i on a.ReqId = i.ReqNo
         ');
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
