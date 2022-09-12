<?php

namespace App\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\PersistentCollection;
use Doctrine\Common\Collections\Collection;


/**
 * @ORM\Table(name="Article")
 * @ORM\Entity(repositoryClass="ArticleRepository")
 */
class Article extends AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @ORM\Column(type="string")
     */
    private $content;

    /**
     * @ORM\Column(type="integer")
     */
    private $territory_id;

    /**
     * @ORM\ManyToOne(targetEntity="Territory", inversedBy="articles")
     */
    private $territory;

    /**
     * @return mixed
     */
    public function getTerritoryId()
    {
        return $this->territory_id;
    }

    /**
     * @param mixed $territory_id
     */
    public function setTerritoryId($territory_id): void
    {
        $this->territory_id = $territory_id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getTerritory()
    {
        return $this->territory;
    }

    /**
     * @param mixed $territory
     */
    public function setTerritory($territory): void
    {
        $this->territory = $territory;
    }
}