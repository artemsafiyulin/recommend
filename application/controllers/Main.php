<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('_header');
		$this->load->view('index');
		$this->load->view('_footer');
	}

    public function profile()
    {
        $this->load->view('_header');
        $this->load->view('profile', [
            'directionName' => $this->db->get_where('directions', ['id' => $this->session->userdata('direction') ?? 0])->row()->name ?? 'Не указано'
        ]);
        $this->load->view('_footer');
    }

    public function result()
    {
        $this->load->view('_header');
        $this->load->view('result');
        $this->load->view('_footer');
    }

    public function fill()
    {
        if ($this->input->post()) {
            if (empty($data = $this->input->post('data', true))) redirect('/fill');
            foreach ($data as $k => $v) {
                $this->session->set_userdata($k, $v);
            }

            $result = array_slice($this->db
                ->select('specialities.name, specialities.ball')
                ->join('specialities', 'specialities.id = students.id_speciality', 'left')
                ->group_by('students.id_speciality')
                ->order_by('AVG(students.study_ball)', 'desc')
                ->get_where('students', [
                    'students.ege_math >=' => ((int) $data['ege_math']) - 7,
                    'students.ege_math <=' => ((int) $data['ege_math']) + 7,
                    'students.ege_phys >=' => ((int) $data['ege_phys']) - 7,
                    'students.ege_phys <=' => ((int) $data['ege_phys']) + 7,
                    'students.ege_russ >=' => ((int) $data['ege_russ']) - 7,
                    'students.ege_russ <=' => ((int) $data['ege_russ']) + 7,
                    'students.attestat >=' => ((float) $data['attestat']) - 0.2,
                    'students.attestat <=' => ((float) $data['attestat']) + 0.2,
                    'students.id_direction' => (int) $data['direction'],
                    'specialities.ball <=' => (int) $data['ege_math'] + (int) $data['ege_phys'] + (int) $data['ege_russ']
                ])->result_array(), 0, 4);

            $this->session->set_userdata('specialities', $result);

            redirect('/result');

        }

        $this->load->view('_header');
        $this->load->view('fill', [
            'directions' => $this->db->order_by('name', 'ASC')->get('directions')->result_array()
        ]);
        $this->load->view('_footer');
    }

    public function fillStudents()
    {
        $directions = $this->db->get('directions')->result_array();
        $specialities = $this->db->get('specialities')->result_array();

        $toInsert = [];

        for ($i = 1; $i <= 30000; $i++) {
            $toInsert[] = [
                'id_direction' => $directions[array_rand($directions)]['id'],
                'id_speciality' => $specialities[array_rand($specialities)]['id'],
                'ege_math' => rand(50,100),
                'ege_phys' => rand(50,100),
                'ege_russ' => rand(50,100),
                'attestat' => rand(39,50)/10,
                'study_ball' => rand(39,50)/10,
            ];
        }

        $this->db->truncate('students');
        $this->db->insert_batch('students', $toInsert);
    }
}
