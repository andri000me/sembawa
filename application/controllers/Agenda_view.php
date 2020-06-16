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
        $date = $this->input->post('date');
        $fullDate = $year . "-" . $month . "-" . $date;
        $x['agenda'] = $this->m_agenda->getAgendaByBulan($fullDate);
        $x['date'] = $date;
        $x['month'] = $month;
        $x['year'] = $year;
        $this->load->view('v_agenda_by_bulan', $x);
    }
}

?>