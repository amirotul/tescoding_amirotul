<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Savedataapi extends CI_Controller{ 
    function __construct(){
        parent:: __construct();
        $this->load->model('Model_savedataapi');

    }


    public function index(){ 
        $url = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';
        $curl = curl_init();
        $fields = array(
            'username' => 'tesprogrammer091223C00',
            'password' => md5('bisacoding-09-12-23')
        );
        $fields_string = http_build_query($fields);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        // print_r($result);
        // curl_close($curl);

        $test_data = json_decode($result);

        $data = $test_data->data;
        $this->Model_savedataapi->save_api($data);
    }
}
?>