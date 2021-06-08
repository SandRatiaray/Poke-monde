<?php

use PhpParser\Node\Name;

namespace App\Entity;

class Article
{

    /**
     *  id de l'article
     * 
     * @var int
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
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }
    public function setContent($content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function setCreatedAt($createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Hydrater une entité (array => entity)
     * @param array $datas
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
