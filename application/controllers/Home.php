<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_Model');
		$this->load->model('Produk_Model');
		$this->load->library('pagination');
	}

	public function index()
	{
//		dd($this->Home_Model->getTopSales());
		$data['popular'] = $this->Home_Model->getProdukPopuler();
		$data['tags'] = $this->Produk_Model->getAllTags();
		$data['cat'] = $this->Produk_Model->getAllCat();
		// dd($data['cat']);
		$data['title'] = 'Batik - Home';
		$data['tesUser'] = $this->session->email;
		//konfigurasi pagination
		$config['base_url'] = base_url('home/index'); //site url
		$config['total_rows'] = $this->Home_Model->hitungProduk(); //total row
		$config['per_page'] = 8;  //show record per halaman
		$config['uri_segment'] = 3;  // uri parameter
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3));
		//konfigurasi pagination
		
		$data['produk'] = $this->Home_Model->getProduk($config['per_page'], $data['page']);         
		$data['populer'] = $this->Home_Model->getProdukPopuler();

		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('home', $data);
	}

	public function about()
	{
		$data['title'] = 'Batik - Contact';
		$this->load->view('about', $data);
	}

	public function contact()
	{
		$data['title'] = 'Batik - Contact';
		$this->load->view('contact', $data);
	}

	public function konfirmasi_barang($id_trx, $email)
  {
		$res = $this->Home_Model->getInfoResiByIdTrx($id_trx, $email);
		// echo $this->db->last_query();
		// echo $id_trx;
		// (var_dump($res));
		if($res != null) {
			$data = [
				'title' => 'Konfirmasi Penerimaan Barang',
				'id_orders' => $res['id_orders'],
				'resi'	=> $res['nomer_resi'],
				'trx_id' =>	$res['transaction_id'],
				'email'	=> $res['email']
			];
			$this->load->view('konfirmasi/konfirmasi-barang', $data);
		} else {
			$this->load->view('konfirmasi/konfirmasi-barang-error');
		}
	}
	
	public function prosses_konfirmasi($id_trx,$email)
	{
		$res = $this->Home_Model->getInfoResiByIdTrx($id_trx, $email);
		if($res != null) {
			$id = $res['transaction_id'];
			if($this->Home_Model->updateKonfirmasi($id, $email)){
				$this->freeM->getSweetAlertHref('message', 'Horayy!', 'Berhasil mengkonfirmasi barang diterima.', 'success', base_url('home'));
				$dataEmail = [
					'id_orders' => $res['id_orders'],
					'nomerResi' => $res['nomer_resi'],
					'nama' => ucwords($res['nama']),
					'email' => $res['email']
				];
				$this->freeM->sendEmail($dataEmail, 'Terima kasih Telah Berbelanja '.$res['id_orders'],EMAIL_FROM,'notif-terimakasih');
				$this->load->view('konfirmasi/konfirmasi-berhasil');
			} else {
				$this->load->view('konfirmasi/konfirmasi-barang-error');
			}
		} else {
			$this->load->view('konfirmasi/konfirmasi-barang-error');
		}
	}

	public function reaktif_akun($token)
	{
		$res = $this->Home_Model->getInfoByToken($token);
		if($res != null) {
			$data = [
				'title'	=> 'Pengaktifan Akun '.$res['nama'],
				'nama' => $res['nama'],
				'token' => $res['token'],
				'email'	=> $res['email']
			];
			if($res['expire_at'] < time()){
				$this->load->view('konfirmasi/pengaktifan-akun-error');
			} else {
				$this->load->view('konfirmasi/pengaktifan-akun', $data);
			}
		} else {
			$this->load->view('konfirmasi/pengaktifan-akun-error');
		}
	}

	public function prosses_reaktif($token)
	{
		$res = $this->Home_Model->getInfoByToken($token);
		if($res != null) {
			$id = $res['id_user'];
			if($this->Home_Model->aktif_customers($id)){
				$this->freeM->getSweetAlertHref('message', 'Horayy!', 'Berhasil mengaktifkan akun Anda.', 'success', base_url('home'));
				$dataEmail = [
					'nama' => $res['nama'],
					'email'	=> $res['email']
				];
				$this->freeM->sendEmail($dataEmail, 'Akun Anda Telah Aktif ['.$res['email'].']',EMAIL_FROM,'notif-akun-aktif');
				$this->load->view('konfirmasi/pengaktifan-akun-berhasil');
			} else {
				$this->load->view('konfirmasi/pengaktifan-akun-error');
			}
		} else {
			$this->load->view('konfirmasi/pengaktifan-akun-error');
		}
	}

	public function detail_cart()
	{
		$data = [
			'title' => 'Batik - Keranjang'
		];
		$this->load->view('produk/cart', $data);
	}
}
