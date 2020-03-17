<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Kompetensi_dasar_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get kompetensi_dasar by id
     */
    function get_kompetensi_dasar($id)
    {
        return $this->db->get_where('kompetensi_dasar',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all kompetensi_dasar
     */
    function get_all_kompetensi_dasar()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('kompetensi_dasar')->result_array();
    }
        
    /*
     * function to add new kompetensi_dasar
     */
    function add_kompetensi_dasar($params)
    {
        $this->db->insert('kompetensi_dasar',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update kompetensi_dasar
     */
    function update_kompetensi_dasar($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('kompetensi_dasar',$params);
    }
    
    /*
     * function to delete kompetensi_dasar
     */
    function delete_kompetensi_dasar($id)
    {
        return $this->db->delete('kompetensi_dasar',array('id'=>$id));
    }

    function get_mapel()
    {
        $id_guru = user_info()['id_guru'];
        $this->db->select('pengajar.*, mapel.id as id_mapel, mapel.nama as nama_mapel');
        $this->db->from('pengajar');
        $this->db->where('id_guru', $id_guru);
        $this->db->where('id_tahun', $_SESSION['id_tahun_pelajaran']);
        // $this->db->join('kelas', 'kelas.id = pengajar.id_kelas');
        $this->db->join('mapel', 'mapel.id = pengajar.id_mapel');
        $this->db->group_by('nama_mapel');
        return $this->db->get()->result_array();

    }
}