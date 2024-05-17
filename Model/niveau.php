<?php

class niveau{
    private int $id_niveau;
    private int $certificat;
    private int $organisme;
    private int $score;

    /**
     * Get the value of id_niveau
     */ 
    public function getId_niveau()
    {
        return $this->id_niveau;
    }

    /**
     * Set the value of id_niveau
     *
     * @return  self
     */ 
    public function setId_niveau($id_niveau)
    {
        $this->id_niveau = $id_niveau;

        return $this;
    }

    /**
     * Get the value of certificat
     */ 
    public function getCertificat()
    {
        return $this->certificat;
    }

    /**
     * Set the value of certificat
     *
     * @return  self
     */ 
    public function setCertificat($certificat)
    {
        $this->certificat = $certificat;

        return $this;
    }

    /**
     * Get the value of organisme
     */ 
    public function getOrganisme()
    {
        return $this->organisme;
    }

    /**
     * Set the value of organisme
     *
     * @return  self
     */ 
    public function setOrganisme($organisme)
    {
        $this->organisme = $organisme;

        return $this;
    }

    /**
     * Get the value of score
     */ 
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     * @return  self
     */ 
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }
}

?>
