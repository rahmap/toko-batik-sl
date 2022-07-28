<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_Model extends CI_Model
{

    public function getProduk($limit, $start)
    {
        $this->db->join('detail_produk', 'detail_produk.id_produk=produk.id_produk');
        $this->db->join('kategori', 'kategori.id_cat=produk.id_cat');
        $this->db->limit($limit, $start);
        $this->db->order_by('produk.id_produk','DESC');
        return $this->db->get_where('produk', ['detail_produk.aktif' => 1])->result_array();
    }

    public function getTopSales()
		{
//			$this->db->from('orders_produk');
			$this->db->select(
				[
					'COUNT(orders_produk.id_produk) AS jmlId',
					'orders_produk.id_produk',
					'SUM(orders_produk.qty) AS jmlQty'
				]
			);
			$this->db->join('orders', 'orders.id_orders=orders_produk.id_orders');
			$this->db->join('produk', 'orders_produk.id_produk=produk.id_produk');
			$this->db->limit(4, 0);
			$this->db->order_by('jmlQty', 'DESC');
			$this->db->group_by('orders_produk.id_produk');
			$full = $this->db->get_where('orders_produk', ['orders.status_order' => 'Selesai', 'produk.delete_at' => 0])->result_array();
//			dd($full);
			$id = [];
			foreach ($full as $ids){
				$id[] = (int)$ids['id_produk'];
			}
//			dd($id);
			return $id;
		}

    public function getProdukPopuler()
    {
			$id = $this->getTopSales();
    	if(count($id) > 0){
				$this->db->join('detail_produk', 'detail_produk.id_produk=produk.id_produk');
				$this->db->join('kategori', 'kategori.id_cat=produk.id_cat');
				$this->db->where_in('produk.id_produk', $id);
				return $this->db->get('produk')->result_array();
			} else {
    		return [];
			}
    }

    public function hitungProduk()
    {
        $this->db->from('produk');
        $this->db->join('detail_produk', 'detail_produk.id_produk=produk.id_produk');
        $this->db->where('detail_produk.aktif', 1);
        return $this->db->count_all_results();
    }

    public function getInfoResiByIdTrx($id_trx, $email)
    {
        $this->db->select([
            'data_user.nama',
            'data_user.email',
            'pengiriman.*',
            'orders.nomer_resi',
            'midtrans.transaction_id',
            'orders.id_orders'
        ]);
        $this->db->join('midtrans','orders.id_orders=midtrans.order_id');
        $this->db->join('pengiriman','pengiriman.id_orders=orders.id_orders');
        $this->db->join('data_user','orders.id_user=data_user.id_user');
        $this->db->where('midtrans.transaction_id', $id_trx);
        $this->db->where('data_user.email', $email);
        $this->db->where('pengiriman.notifikasi_email >', time());
        $this->db->where('orders.status_order', 'settlement');
        return $this->db->get('orders')->row_array();
    }

    public function updateKonfirmasi($id, $email)
    {
        $this->db->select(['midtrans.order_id']);
        $this->db->join('pengiriman','pengiriman.id_orders=midtrans.order_id');
        $this->db->join('orders','orders.id_orders=midtrans.order_id');
        $this->db->join('data_user','orders.id_user=data_user.id_user');
        $this->db->where('midtrans.transaction_id', $id);
        $this->db->where('data_user.email', $email);
        $this->db->where('pengiriman.notifikasi_email >', time());
        $this->db->where('orders.status_order', 'settlement');
        if($id_orders = $this->db->get('midtrans')->row_array()){
            $where = [
                'id_orders' => $id_orders['order_id'],
                'status_order'  => 'settlement',
                'tanggal_selesai' => NULL
            ];
            $data = [
                'status_order' => 'Selesai',
                'status_pengiriman' => 'Terkirim',
                'tanggal_selesai' => date('d/m/Y', time())
            ];
            $this->db->update('orders', $data, $where);
            return $this->db->affected_rows();
        } else {
            return 0;
        }
    }

    public function getInfoByToken($token)
    {
        $this->db->select([
            'data_user.nama',
            'data_user.email',
            'user_token.token',
            'user_token.expire_at',
            'data_user.id_user'
        ]);
        $this->db->join('data_user','data_user.id_user=user_token.id_user');
        return $this->db->get_where('user_token',['user_token.token' => $token])->row_array();
    }

    public function aktif_customers($id)
    {
        $this->db->delete('user_token', ['id_user' => $id]); //Hapus token
        $this->db->update('detail_user', ['is_active' => 1, 'delete_at' => NULL], ['id_user' => $id]);
        return $this->db->affected_rows();
    }

}
