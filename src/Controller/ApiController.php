<?php

namespace App\Controller;

use App\Manager\ArticleManager;
use App\Manager\TerritoryManager;
use App\Repository\ArticleRepository;
use App\Repository\TerritoriesRepository;
use Core\Router\HttpResponse;
use Core\View\View;

class ApiController extends HttpResponse
{
    /**
     * @route_url api/list/all/:kind
     * @param View $view
     * @param TerritoriesRepository $territoriesRepository
     * @param string $kind
     */
    public function listAllZone(View $view, TerritoriesRepository $territoriesRepository, string $kind): void
    {
        $manager = new TerritoryManager($territoriesRepository);

        if (isset($manager::WHITE_OF_KIND_TERRITORY[$kind])) {
            $data = $manager->getListByZone($kind);

            $view->render($data);
        }

        $view->render([], self::BAD_REQUEST);
    }

    /**
     * get the list of territories of lower levels from a given territory
     *
     * @route_url api/territory/children/:id
     * @param View $view
     * @param TerritoriesRepository $territoriesRepository
     * @param int $id
     */
    public function childOfSomeTerritory(View $view, TerritoriesRepository $territoriesRepository, int $id)
    {
        if ($territoriesRepository->find($id)) {
            $manager = new TerritoryManager($territoriesRepository);

            $view->render($manager->getTerritoryChild($id));
        }

        $view->render([],self::BAD_REQUEST);
    }

    /**
     * get the list of articles from the occurrences passed by the url
     *
     * @route_url api/articles/:id/:search
     * @param View $view
     * @param ArticleRepository $articleRepository
     * @param TerritoriesRepository $territoriesRepository
     * @param int $id
     * @param string $search
     */
    public function articlesSearch(View $view, ArticleRepository $articleRepository, TerritoriesRepository $territoriesRepository, int $id, string $search)
    {
        if ($search = array_filter(explode(' ', $search))) {
            if ($territoriesRepository->find($id)) {
                $manager = new ArticleManager($articleRepository, $territoriesRepository, $id, $search);

                $view->render($manager->getArticles());
            } else {

                $view->render([],self::NOT_FOUND);
            }
        }

        $view->render([],self::BAD_REQUEST);
    }
}