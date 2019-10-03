<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Func extends CI_Model {

	function view($params,$data)
	{

		$css 	= isset($params['css'])?$params['css'] : '';
    	$view 	= $params['view'];
    	$modal 	= isset($params['modal'])?$params['modal'] : ''; 
    	$js 	= isset($params['js'])?$params['js'] : '';

    	$config['section_css'] 	= $css?$this->load->view('css/'.$css,$data,true) : '';
    	$config['section_body'] = $this->load->view($view,$data,true);
    	$config['section_modal']= $modal?$this->load->view('modal/'.$modal,$data,true) : '';
    	$config['section_js'] 	= $js?$this->load->view('js/'.$js,$data,true) : '';

    	$this->load->view('app/front',$config);

	}

    function getLastTime($time) 
    { 
        $time = strtotime($time);
        $chunks = [ 
            [60 * 60 * 24 * 365, 'tahun'], 
            [60 * 60 * 24 * 30, 'bulan'], 
            [60 * 60 * 24 * 7, 'minggu'], 
            [60 * 60 * 24, 'hari'], 
            [60 * 60, 'jam'], 
            [60, 'menit'], 
        ]; 
      
        $today = time(); 
        $since = $today - $time; 

        if ($since > 604800) 
        { 
            $print = date("M jS", $time); 
        if ($since > 31536000) 
        { 
          $print .= ", " . date("Y", $time); 
        } 
            return $print; 
        } 

        for ($i = 0, $j = count($chunks); $i < $j; $i++) 
        { 
            $seconds = $chunks[$i][0]; 
            $name = $chunks[$i][1]; 

        if (($count = floor($since / $seconds)) != 0) 
          break; 
        } 

        $print = ($count == 1) ? '1 ' . $name : "$count {$name}"; 
        return $print . ' yang lalu'; 
    }

    function getLastDay($hari){

        $hari = date('D',strtotime($hari));

        switch($hari){
            case 'Sun':
            ('Sun' == date('D'))? $hari_ini = 'Hari ini' : $hari_ini = "Minggu";
            break;
     
            case 'Mon':         
               ('Mon' == date('D'))? $hari_ini = 'Hari ini' :  $hari_ini = "Senin";
            break;
     
            case 'Tue':
                ('Tue' == date('D'))? $hari_ini = 'Hari ini' :  $hari_ini = "Selasa";
            break;
     
            case 'Wed':
                ('Wed' == date('D'))? $hari_ini = 'Hari ini' :  $hari_ini = "Rabu";
            break;
     
            case 'Thu':
                ('Thu' == date('D'))? $hari_ini = 'Hari ini' :  $hari_ini = "Kamis";
            break;
     
            case 'Fri':
                ('Fri' == date('D'))? $hari_ini = 'Hari ini' :  $hari_ini = "Jumat";
            break;
     
            case 'Sat':
                ('Sat' == date('D'))? $hari_ini = 'Hari ini' :  $hari_ini = "Sabtu";
            break;
            
            default:
                $hari_ini = "Tidak di ketahui";     
            break;
        }
     
        return $hari_ini;
     
    }

    // function pushServer($params)
    // {
    //     $ci =& get_instance();

    //     $app_id = $ci->config->item('pusher_app_id');

    //     $key = $ci->config->item('pusher_app_key');

    //     $secret = $ci->config->item('pusher_app_secret');
        
    //     $cluster = $ci->config->item('pusher_app_cluster');

    //     $options = array(
    //         'cluster' => $cluster,
    //         'useTLS' => true
    //     );
    //     $pusher = new Pusher\Pusher(
    //         $key,
    //         $secret,
    //         $app_id,
    //         $options
    //     );

    //     $pusher->trigger('my-channel', 'my-event', $params);
    // }

}

/* End of file M_Func.php */
/* Location: .//F/xampp/htdocs/GitHub/App-Sistem-Informasi/app/models/M_Func.php */