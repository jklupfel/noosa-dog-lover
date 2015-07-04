<?php

class Marker extends CI_Model {
	
	function get_markers($where = NULL, $order_by = NULL)
	{
		$this->db->select('*');
		$this->db->from('Marker');
		if ($where)
		{
			foreach ($where as $field => $value)
			{
				$this->db->where($field, $value);
			}
		}
		if ($order_by)
		{
			$this->db->order_by($order_by);
		}
		else
		{
			$this->db->order_by('Marker.name');
		}
		$query = $this->db->get();
		//echo $this->db->last_query();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $marker)
			{
				$markers[] = $marker;
			}
			return $markers;
		}
		return FALSE;
	}

}