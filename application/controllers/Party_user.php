<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$voted=0;
class party_user extends CI_Controller {
	
	public function start_show_parties(){	
	$this->show_parties(0);
	}
	
	public function start_show_members(){	
	$this->show_members(0);
	}
	
	public function show_parties_voted(){	
	$this->show_parties(1);
	}
	
	public function show_members_voted(){	
	$this->show_leaders_voted();
	}
	
	public function show_parties($voted){			
		$this->load->helper('url');
		$this->load->model('party_model');
		$data['parties']=$this->party_model->getparties();
		$data['page']='party/show_parties';

		if ($voted==0) {$this->load->view('menu/content_user',$data);}
		else $this->load->view('menu/content_user_voted',$data);
	
		$i=0;
		//calculate rows
			$rows=0;
			foreach ($data['parties'] as $a) {
				$rows++;
			}
				foreach ($data['parties'] as $a) {
				$points[$i]=new Point($a['party'],$a['votes']);
				$i++;
													}
		$chart = new PieChart();
		
    if ($rows==0){$points[0]=new Point( 0,0);}
    $dataSet = new XYDataSet();
    
    foreach ($points as $point):
    $dataSet->addPoint($point);
    endforeach;
    $chart->setDataSet($dataSet);

    $chart->setTitle("Parties");	
	 $chart->render("libchart/demo/generated/demo3.png");
	 	
	}
	
	public function show_members($voted){			
		$this->load->helper('url');
		$this->load->model('party_model');
		$data['members']=$this->party_model->getmembers();
		$data['page']='party/show_members_user';
		if ($voted==0) {$this->load->view('menu/content_user',$data);}
		else $this->load->view('menu/content_user_voted',$data);
	}

	public function show_leaders(){			
		$this->load->helper('url');
		$this->load->model('party_model');
		$data['members']=$this->party_model->getleaders();
		$data['page']='party/show_leaders_user';
		$this->load->view('menu/content_user',$data);
	}
	public function show_leaders_voted(){			
		$this->load->helper('url');
		$this->load->model('party_model');
		$data['members']=$this->party_model->getleaders();
		$data['page']='party/show_leaders_user_voted';
		$this->load->view('menu/content_user_voted',$data);
	}
	
	public function vote() {
		$this->load->helper('url');
		$this->load->model('party_model');
		$data['parties']=$this->party_model->getparties();
		$data['page']='party/add_vote_user';
		$this->load->view('menu/content_user_voted',$data);
	}
	
public function add_vote($chosen_id){
		$this->load->helper('url');
		$this->load->model('party_model');
		$this->party_model->add_vote($chosen_id);
		$voted=1;
		$this->show_parties($voted);
		
	}
}