<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CronJob extends CI_Controller
{
  public function cronKonfirmasi983242dfsf98fdfpp() //Url cronjob
  {
    $this->db->select([
      'pengiriman.notifikasi_email',
      'orders.tanggal_selesai',
      'orders.status_order',
      'orders.id_orders'
    ]);
    $this->db->join('pengiriman','pengiriman.id_orders=orders.id_orders');
    $this->db->where('pengiriman.notifikasi_email <', time());
    $this->db->where('orders.tanggal_selesai', NULL);
    $this->db->where('orders.status_order', 'settlement');
    $hasil = $this->db->get('orders')->result_array();
    $jml = 0;
    if(count($hasil) > 0){
      $this->load->model('Admin_Model');
      foreach($hasil as $res){
        $resDataEmail = $this->Admin_Model->getInfoResiById($res['id_orders']);
        $dataEmail = [
          'id_orders' => $resDataEmail['id_orders'],
          'nomerResi' => $resDataEmail['nomer_resi'],
          'nama' => ucwords($resDataEmail['nama']),
          'email' => $resDataEmail['email']
        ];
        $id_orders = $res['id_orders'];
        $data = [
          'status_order' => 'Selesai',
          'status_pengiriman' => 'Terkirim',
          'tanggal_selesai' => date('d/m/Y', time())
        ];
        $where = [
          'id_orders' => $id_orders,
          'status_order'  => 'settlement',
          'tanggal_selesai' => NULL
        ];
        $this->db->update('orders', $data, $where);
        $this->freeM->sendEmail($dataEmail, 'Terima kasih Telah Berbelanja '.$id_orders,EMAIL_FROM,'notif-terimakasih'); //Auto send email ke pelanggan
        echo $this->db->last_query();
        echo '<br><br>';
        $jml++;
      }
      echo 'Terupdate '.$jml.' tanggal '.date('d/m/Y H:i');
    }
  }
}