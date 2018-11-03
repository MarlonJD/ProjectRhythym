<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

// Users and Statements
function getUserNamebyID($id)
{
    $CI =& get_instance();
    
        $query = $CI->db->get_where('users',array('id'=>$id));
        foreach ($query->result() as $row)
        {
            echo $row->username;
        }
}

// Statements
function getTypebyID($i)
{
    if ($i == 0) {
        echo "Album";
    } elseif ($i == 1) {
        echo "EP";
    } elseif ($i == 2) {
        echo "Single";
    } elseif ($i == 3) {
        echo "Label";
    } 
}

function getCurrencybyID($i)
{
    if ($i == 0) {
        return " ₺";
    } elseif ($i == 1) {
        return " $";
    }
}

// Stats
function getContentbyID($id, $key)
{
    $CI =& get_instance();
    
        $query = $CI->db->get_where('dist',array('id'=>$id));
        foreach ($query->result() as $row)
        {
            return $row->$key;
        }
}

function getPlatfrombyID($i)
{
    if ($i == 0) {
        return "Youtube";
    } elseif ($i == 1) {
        return "Spotify";
    } elseif ($i == 2) {
        return "Apple Store";
    } elseif ($i == 3) {
        return "Amazon";
    } elseif ($i == 4) {
        return "Play Store";
    } elseif ($i == 5) {
        return "Deezer";
    } elseif ($i == 6) {
        return "Shazam";
    } elseif ($i == 7) {
        return "Tidal";
    }
}

// Other Genre
function getGenreTypebyID($i)
{
    if ($i == 0) {
        echo "Genre";
    } elseif ($i == 1) {
        echo "Subgenre";
    }
}

function getGenrebyID($id)
{
    $CI =& get_instance();
    
        $query = $CI->db->get_where('genres',array('id'=>$id));
        foreach ($query->result() as $row)
        {
            echo $row->text;
        }
}
