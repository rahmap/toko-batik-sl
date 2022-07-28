<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Free_Model extends CI_Model
{

    private $namaFlash;

    public function getInfoUser()
    {
        $this->db->join('detail_user', 'detail_user.id_user=data_user.id_user');
        return $this->db->get_where('data_user', ['data_user.id_user' => $this->session->id_user])->row_array();
    }

    public function getImageUser()
    {
        $img = $this->getInfoUser();
        return  $img['foto'];
    }

    public function getDateJoin()
    {
        $joinAt = $this->getInfoUser();
        return  $joinAt['create_date'];
    }

    public function getPassword()
    {
        $password = $this->getInfoUser();
        return  $password['password'];
    }

    public function getAlertBS($namaFlash, $jenis, $judul, $pesan)
    {
        return  $this->session->set_flashdata($namaFlash, '<div class="alert alert-' . $jenis . ' alert-dismissible fade show" role="alert">
        <strong>' . $judul . '</strong> ' . $pesan . '.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    }

    public function getSweetAlert($namaFlash, $title = '', $text = '', $type = '')
    {
        return  $this->session->set_flashdata($namaFlash, "<script>
		var title = '$title';
		var text = '$text'; 
		var type = '$type';
			Swal.fire(title,text,type);
		</script>");
    }


    public function getSweetAlertHref($namaFlash, $title = '', $text = '', $type = '', $href = '')
    {
        return  $this->session->set_flashdata($namaFlash, "<script>
		var title = '$title';
		var text = '$text'; 
		var type = '$type';
			Swal.fire(title,text,type).then(function() {
              window.location = '$href';
          });
		</script>");
    }

    public function getUnikProduk($id)
    {
        $this->db->select_max('id_produk', 'max');
        $data = $this->db->get('produk')->row_array();
        $nama = $this->db->get_where('kategori', ['id_cat' => $id])->row_array();
        $noUrut = substr($data['max'], 0, 6);
        $noUrut++;
        return strtoupper($nama['nama_cat']) . sprintf("%06s", $noUrut);
    }

    public function cek_ajax()
    {
      if(!$this->input->is_ajax_request()){
        die('mdfk');
      }
    }

    public function sendEmail($data, $subject, $from, $file)
    {
        //Jika tidak mau pake Mailgun, mungkin bisa di ganti pake Email sender dari CI nya
      ($data == null)? die('DATA KOSONG'): '';
      if(MAILGUN == 'TRUE'){
        $this->load->library('mailgun');
        $this->mailgun->initialize(array(
          'apikey' => API_MAILGUN, //Ganti dengan key anda                            
          'domain' => DOMAIN_MAILGUN //Ganti dengan domain anda, cek config/Constants.php
        ));
      
        $this->mailgun->from($from, 'Toko Pakaian Millano');                  
        $this->mailgun->to($data['email'], $data['nama']);           
        $this->mailgun->subject($subject);                                       
        $this->mailgun->message($this->load->view('email/'.$file, $data, TRUE));                                 
    
        return $this->mailgun->send();
      } else {
				$this->load->library('email');

				$body = $this->load->view('email/'.$file, $data, TRUE);

				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => SMTP_HOST,
					'smtp_port' => SMTP_PORT,
					'smtp_user' => $from,
					'smtp_pass' => SMTP_PASS,
					'mailtype'  => 'html',
					'charset'   =>'utf-8',
					'wordwrap'  => TRUE,
					'smtp_timeout' => 30
				);

				$this->email->initialize($config);
				// $this->email->set_newline("\r\n");
				// $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
				// $this->email->set_header('Content-type', 'text/html');

				$this->email->from($from, 'Toko Pakaian Millano');
				$this->email->to($data['email']);
				$this->email->subject($subject);
				$this->email->message($body);

				return $this->email->send();
      }
    }
}
