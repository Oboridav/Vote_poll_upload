<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class party_admin extends CI_Controller {
	
	public function show_parties(){			
		$this->load->helper('url');
		$this->load->model('party_model');
		$data['parties']=$this->party_model->getparties();
		$data['page']='party/show_parties';

		$this->load->view('menu/content_admin',$data);
	
		$i=0;
		//calculate rows
			$rows=0;
			foreach ($data['parties'] as $a) {
				$rows++;
			}
			// create data for chart
				foreach ($data['parties'] as $a) 
				{
				$points[$i]=new Point($a['party'],$a['votes']);
				$i++;
				}
			// create pie chart										
		$chart = new PieChart();
		
    if ($rows==0){$points[0]=new Point( 0,0);}
    $dataSet = new XYDataSet();
    // use data 
    foreach ($points as $point) $dataSet->addPoint($point);
    $chart->setDataSet($dataSet);
    $chart->setTitle("Parties");
	// pie chart will be save in this location
	 $chart->render("libchart/demo/generated/demo3.png");	
	}
	
	public function show_members(){			
		$this->load->helper('url');
		$this->load->model('party_model');
		$data['members']=$this->party_model->getmembers();
		$data['page']='party/show_members_admin';
		$this->load->view('menu/content_admin',$data);
	}
	
	public function show_leaders(){			
		$this->load->helper('url');
		$this->load->model('party_model');
		$data['members']=$this->party_model->getleaders();
		$data['page']='party/show_leaders_admin';
		$this->load->view('menu/content_admin',$data);
	}

	public function add_parties() {
		$this->load->helper('url');
		$this->load->model('party_model');
		$btn=$this->input->post('btnSave');
		if (isset($btn)) {
			$insert_data=array(
				"party"=>$this->input->post('fn'),
				"votes"=>$this->input->post('ln')
				);
			$data['test']=$this->party_model->addparty($insert_data);

		}
		$data['page']='party/add_parties';
		$this->load->view('menu/content_admin',$data);
	}

	public function delete_parties() {
		$this->load->helper('url');
		$this->load->model('party_model');
		$data['parties']=$this->party_model->getparties();
		$data['page']='party/delete_parties';
		$this->load->view('menu/content_admin',$data);
	}

	public function remove_party($chosen_id){
		$this->load->helper('url');
		$this->load->model('party_model');
		$this->party_model->deleteparty($chosen_id);
		$this->show_parties(1);
	}

	public function update_parties() {
		$this->load->helper('url');
		$this->load->model('party_model');
		$btn=$this->input->post('btnSave');
		if (isset($btn)) {
			$a_party=$this->input->post('fn');
			$a_lname=$this->input->post('ln');
			$id_parties=$this->input->post('id');
			//calculate rows
			$rows=0;
			//update database row by row
			for($x=0; $x < $rows; $x++ ){
				$update_data=array(
					"party"=>$a_party[$x],
					"votes"=>$a_lname[$x]
					);
				$this->party_model->updateparty($update_data,$id_parties[$x]);
			}
		
		}
		
		$data['parties']=$this->party_model->getparties();
		$data['page']='party/update_parties';
		$this->load->view('menu/content_admin' ,$data);
	}
	
	public function vote() {
		$this->load->helper('url');
		$this->load->model('party_model');
		$data['parties']=$this->party_model->getparties();
		$data['page']='party/add_vote_admin';
		$this->load->view('menu/content_admin',$data);
	}
	
public function add_vote($chosen_id){
		$this->load->helper('url');
		$this->load->model('party_model');
		$this->party_model->add_vote($chosen_id);
		$this->show_parties();
	}
}