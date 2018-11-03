<?php defined('BASEPATH') OR exit('No direct script access allowed');
class MainModel extends CI_Model
{
  function __construct()
     {
         parent::__construct();
         $this->load->database();//database bağlantısı yapıyoruz.
     }
    
    function getDistbyUserID($key)
    {
        $at = $this->db->get_where('dist', array('userid'=>$key));
        return $at->result();
    }

    function sendDistFunction()
    {
        $data = array(
            'userid'=>$this->input->post('userid'),
            'artist'=>$this->input->post('inputArtist'),
            'type'=>$this->input->post('inputType'),
            'title'=>$this->input->post('inputTitle'),
            'genre'=>$this->input->post('inputGenre'),
            'sgenre'=>$this->input->post('inputsGenre'),
            'releaseDate'=>$this->input->post('inputReleaseDate'),
            'media'=>$this->input->post('upMedia'),
            'cover'=>$this->input->post('upCover'),
            'agreement'=>$this->input->post('cbAgg'),
            'cbYoutube'=>$this->input->post('cbYoutube'),
            'cbSpotify'=>$this->input->post('cbSpotify'),
            'cbApple'=>$this->input->post('cbApple'),
            'cbAmazon'=>$this->input->post('cbAmazon'),
            'cbDeezer'=>$this->input->post('cbDeezer'),
            'cbGPlay'=>$this->input->post('cbGPlay'),
            'cbShazam'=>$this->input->post('cbShazam'),
            'cbTidal'=>$this->input->post('cbTidal')

        );
        $this->db->insert('dist',$data);
    }

    function getGenres()
    {
        $at = $this->db->get_where('genres', array('type'=>'0'));
        return $at->result();
    }

    function veri_silme_fonksiyonu($id)
    {
        $query = "DELETE FROM kisiler WHERE id = $id";
        $result = $this->db->query($query);				
    }


    function getSubGenresF($genreid)
    {
         $at = $this->db->get_where('genres', array('type'=>'1', 'genreid'=>$genreid));
         return $at->result();
    }

    // Earning

    function getStatsbyUserID($userid)
    {
        $this->db->from("statement");
        $this->db->order_by('id', 'DESC');
        $at = $this->db->where('userid', $userid);
        return $this->db->get()->result();
    }

    function getEarningsbyUserID($userid)
    {   
        $query = $this->db->get_where('dist',array('userid'=>$userid));
        $limit = $query->num_rows();
        for ($i = 0; $i < $limit; $i++)
        {       
            $contents[$i] = $query->row($i)->id;
        }
        for ($j = 0; $j < count($contents); $j++)
        {       
            $query2 = $this->db->get_where('stats',array('cid'=>$contents[$j]));
            $limit2 = $query2->num_rows();
            for ($k = 0; $k < $limit2; $k++)
            {
                $result[] = $query2->row($k);
            }
        }
        return $result;
    }

    function changeState($id, $userid)
    {
        $query = "UPDATE statement SET status = 1 WHERE id = $id AND userid = $userid";
        $result = $this->db->query($query);
    }

    function changePID($id, $userid, $sid)
    {
        $query = "UPDATE statement SET pid = $sid WHERE id = $id AND userid = $userid";
        $result = $this->db->query($query);
    }


    function sendPayment()
    {
        $data = array(
            'sid'=>$this->input->post('inputSID'),
            'name'=>$this->input->post('inputName'),
            'adress'=>$this->input->post('inputAdress'),
            'bankname'=>$this->input->post('inputBankname'),
            'bAddress'=>$this->input->post('inputBaddress'),
            'bCountry'=>$this->input->post('inputBCountry'),
            'swift'=>$this->input->post('inputSwift'),
            'IBAN'=>$this->input->post('inputIBAN'),
            'currency'=>$this->input->post('inputCurrency')
        );
        $this->db->insert('payment',$data);
    }

    function getAllLinks()
    {
        $this->db->from("links");
        //$this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    function getUserCID($userid)
    {   
        $query = $this->db->get_where('dist',array('userid'=>$userid));
        $limit = $query->num_rows();
        for ($i = 0; $i < $limit; $i++)
        {       
            $contents[$i] = $query->row($i)->id;
        }
        for ($j = 0; $j < count($contents); $j++)
        {       
            $query2 = $this->db->get_where('contentid',array('cid'=>$contents[$j]));
            $limit2 = $query2->num_rows();
            for ($k = 0; $k < $limit2; $k++)
            {
                $result[] = $query2->row($k);
            }
        }
        return $result;
    }

    function confirmCIDFunction($sId)
    {
        $query = "UPDATE contentid SET status = 1 WHERE cid = $sId";
        $result = $this->db->query($query);
    }

}
?>