<?php

class formation{
    private int $id_formation ;
    private string $langue;
    private string $niveau;
    private date $date_de_debut;
    private date $date_de_fin;
    private int $duree;
    private float $prix;
    private string $titre;
    private string $description;

    /**
     * Get the value of id_formation
     */ 
    public function getId_formation()
    {
        return $this->id_formation;
    }

    /**
     * Set the value of id_formation
     *
     * @return  self
     */ 
    public function setId_formation($id_formation)
    {
        $this->id_formation = $id_formation;

        return $this;
    }

    /**
     * Get the value of langue
     */ 
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set the value of langue
     *
     * @return  self
     */ 
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get the value of niveau
     */ 
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set the value of niveau
     *
     * @return  self
     */ 
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get the value of date_de_debut
     */ 
    public function getDate_de_debut()
    {
        return $this->date_de_debut;
    }

    /**
     * Set the value of date_de_debut
     *
     * @return  self
     */ 
    public function setDate_de_debut($date_de_debut)
    {
        $this->date_de_debut = $date_de_debut;

        return $this;
    }

    /**
     * Get the value of date_de_fin
     */ 
    public function getDate_de_fin()
    {
        return $this->date_de_fin;
    }

    /**
     * Set the value of date_de_fin
     *
     * @return  self
     */ 
    public function setDate_de_fin($date_de_fin)
    {
        $this->date_de_fin = $date_de_fin;

        return $this;
    }

    /**
     * Get the value of duree
     */ 
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set the value of duree
     *
     * @return  self
     */ 
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}


?>