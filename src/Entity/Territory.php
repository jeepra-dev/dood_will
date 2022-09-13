<?php

namespace App\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JetBrains\PhpStorm\Pure;


/**
 * @ORM\Table(name="territory")
 * @ORM\Entity(repositoryClass="TerritoriesRepository")
 */
class Territory extends AbstractEntity
{
    protected array $excludeProperties = ['children', 'parents', 'electedOfficials', 'articles'];
    private bool $child = false;

    #[Pure] public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->parents = new ArrayCollection();
        $this->articles = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $kind;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param mixed $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdateAt()
    {
        return $this->update_at;
    }

    /**
     * @param mixed $update_at
     */
    public function setUpdateAt($update_at)
    {
        $this->update_at = $update_at;
    }

    /**
     * @return mixed
     */
    public function getIsCurrent()
    {
        return $this->is_current;
    }

    /**
     * @param mixed $is_current
     */
    public function setIsCurrent($is_current)
    {
        $this->is_current = $is_current;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @param mixed $population
     */
    public function setPopulation($population)
    {
        $this->population = $population;
    }

    /**
     * @return mixed
     */
    public function getOfficialWebsiteUrl()
    {
        return $this->official_website_url;
    }

    /**
     * @param mixed $official_website_url
     */
    public function setOfficialWebsiteUrl($official_website_url)
    {
        $this->official_website_url = $official_website_url;
    }

    /**
     * @return mixed
     */
    public function getArtcilesCount()
    {
        return $this->artciles_count;
    }

    /**
     * @param mixed $artciles_count
     */
    public function setArtcilesCount($artciles_count)
    {
        $this->artciles_count = $artciles_count;
    }

    /**
     * @return mixed
     */
    public function getAdminDocsCount()
    {
        return $this->admin_docs_count;
    }

    /**
     * @param mixed $admin_docs_count
     */
    public function setAdminDocsCount($admin_docs_count)
    {
        $this->admin_docs_count = $admin_docs_count;
    }

    /**
     * @return mixed
     */
    public function getImpactersCount()
    {
        return $this->impacters_count;
    }

    /**
     * @param mixed $impacters_count
     */
    public function setImpactersCount($impacters_count)
    {
        $this->impacters_count = $impacters_count;
    }

    /**
     * @return mixed
     */
    public function getWebsitesCount()
    {
        return $this->websites_count;
    }

    /**
     * @param mixed $websites_count
     */
    public function setWebsitesCount($websites_count)
    {
        $this->websites_count = $websites_count;
    }

    /**
     * @return mixed
     */
    public function getOurcesCoun()
    {
        return $this->ources_coun;
    }

    /**
     * @param mixed $ources_coun
     */
    public function setOurcesCoun($ources_coun)
    {
        $this->ources_coun = $ources_coun;
    }

    /**
     * @return Collection
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    /**
     * @param ArrayCollection $children
     */
    public function setChildren(ArrayCollection $children)
    {
        $this->children = $children;
    }

    /**
     * @return Collection
     */
    public function getParents(): Collection
    {
        return $this->parents;
    }

    /**
     * @return ArrayCollection
     */
    public function getElectedOfficials(): Collection
    {
        return $this->electedOfficials;
    }

    /**
     * @param ArrayCollection $electedOfficials
     */
    public function setElectedOfficials(ArrayCollection $electedOfficials): void
    {
        $this->electedOfficials = $electedOfficials;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string")
     */
    private $update_at;

    /**
     * @ORM\Column(type="string")
     */
    private $is_current;

    /**
     * @ORM\Column(type="integer")
     */
    private $population;

    /**
     * @ORM\Column(type="string")
     */
    private $official_website_url;

    /**
     * @ORM\Column(type="string")
     */
    private $artciles_count;

    /**
     * @ORM\Column(type="string")
     */
    private $admin_docs_count;

    /**
     * @ORM\Column(type="string")
     */
    private $impacters_count;

    /**
     * @ORM\Column(type="string")
     */
    private $websites_count;

    /**
     * @ORM\Column(type="string")
     */
    private $ources_coun;

    /**
     * @ORM\OneToMany(targetEntity="HierarchyTerritory", mappedBy="child", fetch="EXTRA_LAZY")
     */
    private $children;

    /**
     * @ORM\OneToMany(targetEntity="HierarchyTerritory", mappedBy="parent", fetch="EXTRA_LAZY")
     */
    private $parents;

    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="territory", fetch="EXTRA_LAZY")
     */
    private $articles;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="territory", fetch="EXTRA_LAZY")
     */
    private $users;

    /**
     * @return ArrayCollection
     */
    public function getArticles(): ArrayCollection
    {
        return $this->articles;
    }

    /**
     * @param ArrayCollection $articles
     */
    public function setArticles(ArrayCollection $articles): void
    {
        $this->articles = $articles;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users): void
    {
        $this->users = $users;
    }

    /**
     * @return bool
     */
    public function hasChild(): bool
    {
        return $this->child = $this->parents->count() && 1;
    }
}