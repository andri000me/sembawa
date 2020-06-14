<?php 

class Agenda_view extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_agenda');
    }

    function getAgenda(){
        $month = $this->input->post('bln');
        $year = $this->input->post('thn');
        $x['agenda'] = $this->m_agenda->getAgendaByBulan($month,$year);
        $x['month'] = $month;
        $x['year'] = $year;
        $this->load->view('v_agenda_by_bulan', $x);
    }
}

?>