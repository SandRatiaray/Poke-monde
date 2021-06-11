<?php

namespace App\Entity;

class Article
{

    /**
     *  id de l'article
     * 
     * @return mixed
     * 
     */
    private $id;

    /**
     * Titre de l'article 
     * 
     * @var string
     */
    private $title;

    /**
     * Contenu de l'article
     * 
     * @var text
     */
    private $content;

    /**
     * Date de création de l'article
     * 
     * @var datetime
     */
    private $createdAt;

    public function __construct($id, $title, $content, $createdAt)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Hydrate
     * @param array $article
     * @return mixed
     */
    public function hydrate(array $article)
    {
        foreach ($article as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
