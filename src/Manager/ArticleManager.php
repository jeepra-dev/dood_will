<?php
namespace App\Manager;

use App\Repository\ArticleRepository;
use App\Repository\HierarchyRepository;
use App\Repository\TerritoriesRepository;
use Doctrine\Common\Util\Debug;

class ArticleManager
{
    private ArticleRepository $articleRepository;
    private int $territoryId;
    private array $search;
    private TerritoriesRepository $territoriesRepository;
    private array $data = [];

    /**
     * constructor
     *
     * @param ArticleRepository $articleRepository
     * @param TerritoriesRepository $territoriesRepository
     * @param int $territoryId
     * @param array $search
     */
    public function __construct(ArticleRepository $articleRepository, TerritoriesRepository $territoriesRepository, int $territoryId, array $search)
    {
        $this->articleRepository = $articleRepository;
        $this->territoryId = $territoryId;
        $this->search = $search;
        $this->territoriesRepository = $territoriesRepository;
    }

    /**
     * add article to list of articles
     *
     * @param int $territoryId
     * @return void
     */
    private function addArticle(int $territoryId)
    {
        $articles = $this->articleRepository->getArticlesByName($territoryId, $this->search);

        foreach ($articles as $article) {
            $this->data[$article['territory_id']]  = $article;
        }
    }

    /**
     * search article by territory
     *
     * @param int $territoryId id of some territory
     * @return array
     */
    public function getArticleByTerritory(int $territoryId): array
    {
        $this->addArticle($territoryId);
        $children = $this->territoriesRepository->territoryChild($territoryId);

        foreach ($children as $child) {
            if ($child->hasChild()) {
                $this->getArticleByTerritory($child->getId());
            }
        }

        return $this->data;
    }

    /**
     * allow getting matched article from website
     *
     * @return array
     */
    public function getArticles(): array
    {
        $this->addArticle($this->territoryId);

        return array_values($this->getArticleByTerritory($this->territoryId));
    }

}