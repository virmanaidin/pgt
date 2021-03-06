<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data ['title'] = 'My Profile' ;
        $data['user'] = $this->db->get_where('user',['email' => 
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function pegawai()
    {
        $data ['title'] = 'Data Pegawai';
        $data['user'] = $this->db->get_where('user',['email' => 
        $this->session->userdata('email')])->row_array();
        
        $data['nama'] = $this->db->get('pegawai')->result_array();

        $this->form_validation->set_rules('nama','Nama','required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/pegawai', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
            'nama' => $this->input->post('nama'),
            'status' => $this->input->post('status'),
            'pangkat' => $this->input->post('pangkat'),
            'pendidikan' => $this->input->post('pendidikan'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'masa_kerja' => $this->input->post('masa_kerja')];

            $this->db->insert('pegawai', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Menu Added</div>');
            redirect('user/pegawai');
        }
            
    }

    public function hapuspgw($id)
    
    {
        $data ['title'] = 'Hapus' ;
        $data['user'] = $this->db->get_where('user',['email' => 
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/jadwal', $data);
        $this->load->view('templates/footer');


        $data['nama'] = $this->db->delete('pegawai', array('id' => $id));
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('user/pegawai');
    } 

    public function jadwal()
    {
        $data ['title'] = 'Jadwal Shift';
        $data['user'] = $this->db->get_where('user',['email' => 
        $this->session->userdata('email')])->row_array();
        
        $data['nama'] = $this->db->get('shift')->result_array();

        $this->form_validation->set_rules('nama','Nama','required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/jadwal', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
            'nama' => $this->input->post('nama'),
            'status' => $this->input->post('status'),
            'jam' => $this->input->post('jam'),
            'tgl' => $this->input->post('tgl')];

            $this->db->insert('shift', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Menu Added</div>');
            redirect('user/jadwal');
        }
    }

    public function hapusjdwl($id)
    
    {
        $data ['title'] = 'Hapus' ;
        $data['user'] = $this->db->get_where('user',['email' => 
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/jadwal', $data);
        $this->load->view('templates/footer');


        $data['nama'] = $this->db->delete('shift', array('id' => $id));
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('user/jadwal');
    } 

    public function absensi()
    
    {
        $data ['title'] = 'Absensi' ;
        
        $data['user'] = $this->db->get_where('user',['email' => 
        $this->session->userdata('email')])->row_array();
        if($this->session->userdata('role_id')==2){
            $data['absen'] = $this->db->get_where('absen', ['user_id' => $this->session->userdata('id')])->result_array();
        }else{
            $data['absen'] = $this->db->query('SELECT *
                            FROM absen
                            GROUP BY user_id')->result_array();
        }
        $this->form_validation->set_rules('nama','Nama','required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/absensi', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                "nama" => $this->input->post('nama'),
                "tanggal" => $this->input->post('tanggal'),
                "jam" => $this->input->post('jam'),
                "user_id" => $this->input->post('user_id')
            ];

            $this->db->insert("absen", $data);

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Absensi tercatat</div>');
            redirect('user/absensi');
        }
    }

    public function detailAbsen($id)
    
    {
        $data ['title'] = 'Absensi' ;
        
        $data['user'] = $this->db->get_where('user',['email' => 
        $this->session->userdata('email')])->row_array();
        $data['nama'] = $this->db->query('SELECT nama
                            FROM absen
                            WHERE user_id ='. $id.'
                            GROUP BY user_id')->row_array();
        $data['absen'] = $this->db->get_where('absen', ['user_id' => $id])->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/absensiDetail', $data);
        $this->load->view('templates/footer');
    }

    public function kinerja()
    
    {
        $data ['title'] = 'Penilaian Kinerja' ;
        $data['user'] = $this->db->get_where('user',['email' => 
        $this->session->userdata('email')])->row_array();
        $data['Periode'] = $this->db->get('kinerja')->result_array();

        $this->form_validation->set_rules('Periode','Periode','required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/kinerja', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
            'Periode' => $this->input->post('Periode'),
            'kriteria' => $this->input->post('kriteria'),
            'penilaian' => $this->input->post('penilaian'),
            'keterangan' => $this->input->post('keterangan')
        ];
            
            $this->db->insert('kinerja', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Menu Added</div>');
            redirect('user/kinerja');
    }
}

    public function hapusknrj($id)
    {
        $data ['title'] = 'Hapus' ;
        $data['user'] = $this->db->get_where('user',['email' => 
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/kinerja', $data);
        $this->load->view('templates/footer');

        $data['Periode'] = $this->db->delete('kinerja', array('id' => $id));
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('user/kinerja');
    } 

    public function detail($id)
    
    {
        $data ['title'] = 'Details Penilaian Kinerja' ;
        $data['user'] = $this->db->get_where('user',['email' => 
        $this->session->userdata('email')])->row_array();
        // $data['Periode'] = $this->db->query('SELECT * FROM kinerja WHERE id = id');
        $data['Periode'] = $this->db->get_where('kinerja', ['id' => $id])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }

    public function getubah(){
        echo $_POST['id'];
    }
            
}