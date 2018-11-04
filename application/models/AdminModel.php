<?php defined('BASEPATH') OR exit('No direct script access allowed');
class AdminModel extends CI_Model
{
    function __construct()
    {
         parent::__construct();
         $this->load->database();//database bağlantısı yapıyoruz.
    }

    //Admin Dist Pages
    function getDists($key)
    {
        $at = $this->db->get_where('dist', array('status'=>$key));
        return $at->result();
    }
    
        
    function sendGenresFunction()
    {
        $data = array(
            'type'=>$this->input->post('inputType'),
            'genreid'=>$this->input->post('inputGenreid'),
            'text'=>$this->input->post('inputText'),
        );
        $this->db->insert('genres',$data);
    }

    function SendStatsFunction()
    {
        $data = array(
            'cid'=>$this->input->post('inputCid'),
            'pid'=>$this->input->post('inputPid'),
            'stream'=>$this->input->post('inputStream'),
            'down'=>$this->input->post('inputDown'),
            'adown'=>$this->input->post('inputAdown'),
            'revenue'=>$this->input->post('inputRevenue'),
            'currency'=>$this->input->post('inputCurrency')
        );
        $this->db->insert('stats',$data);
    }

    function SendStatementFunction()
    {
        $data = array(
            'userid'=>$this->input->post('inputUserid'),
            'type'=>$this->input->post('inputType'),
            'period'=>$this->input->post('inputPeriod'),
            'value'=>$this->input->post('inputValue'),
            'currency'=>$this->input->post('inputCurrency')
        );
        $this->db->insert('statement',$data);
    }

    //admin dist confirm
    function changeDist($distId, $num)
    {
        $query = "UPDATE dist SET status = $num WHERE id = $distId";
        $result = $this->db->query($query);
    }

    function sendDistAsUser()
    {
        $data = array(
            'userid'=>$this->input->post('inputUserid'),
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

    //Genres Functions
    function getAllUsers()
    {
        $at = $this->db->get_where('users', array('is_admin'=>'0'));
        return $at->result();
    }

    //Earning Stats Functions
    function getAllStats()
    {
        $this->db->from("stats");
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    //Earning Statements Functions
    function getAllStatements()
    {
        $this->db->from("statement");
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    //admin earning pages
    function getAllContents()
    {
        $at = $this->db->get_where('dist');
        return $at->result();
    }

    //Earning States 
    function getPDFunction($id)
    {
        $this->db->from("payment");
        $this->db->where('id', $id);
        return $this->db->get()->result();
    }

    function changePF($sId, $num)
    {
        $query = "UPDATE statement SET status = $num WHERE id = $sId";
        $result = $this->db->query($query);
    }

    //Other Genre Functions
    function getAllGenres()
    {
        $at = $this->db->get_where('genres');
        return $at->result();
    }
    
    function getGenres()
    {
        $at = $this->db->get_where('genres', array('type'=>'0'));
        return $at->result();
    }

    // Other Links
    function getAllLinks()
    {
        $this->db->from("links");
        //$this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    function sendLinksFunction()
    {
        $data = array(
            'title'=>$this->input->post('inputTitle'),
            'link'=>$this->input->post('inputLink')
        );
        $this->db->insert('links',$data);
    }

    function RemoveLinksFunction($id)
    {
        $query = "DELETE FROM links WHERE id = $id";
        $result = $this->db->query($query);				
    }

    //Content ID
    function sendCIDFunction()
    {
        $data = array(
            'cid'=>$this->input->post('inputCid'),
            'link'=>$this->input->post('inputLink')
        );
        $this->db->insert('contentid',$data);
    }

    function getAllCID()
    {
        $this->db->from("contentid");
        return $this->db->get()->result();
    }
    
    function RemoveCIDFunction($id)
    {
        $query = "DELETE FROM contentid WHERE id = $id";
        $result = $this->db->query($query);				
    }
}
?>