<?php
Class party_model extends CI_model {
	
	public function getparties(){
		$this->db->select('*');
		$this->db->from('parties');
		return $this->db->get()->result_array();
	}
	
	public function getmembers(){
		$this->db->select('parties.party,members.member');    
		$this->db->from('parties');
		$this->db->join('members', 'parties.id_parties = members.id_parties');
		return $this->db->get()->result_array();
	}
	
	public function getleaders(){
		$this->db->select('parties.party,members.member');    
		$this->db->from('parties');
		$this->db->join('members', 'parties.id_parties = members.id_parties');
		$this->db->where('leader','1');
		return $this->db->get()->result_array();
	}

	public function addparty($insert_data){
		$this->db->insert('parties',$insert_data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}

	public function deleteparty($chosen_id) {
		$this->db->where('id_parties',$chosen_id);
		$this->db->delete('parties');
	}

	public function updateparty($update_data,$id_parties){
		$this->db->where('id_parties',$id_parties);
		$this->db->update('parties',$update_data);

	}
	
	public function add_vote($id)
{
    $sql = 'UPDATE parties set votes=votes+1 where id_parties='.$id;
    $this->db->query($sql);
}
}