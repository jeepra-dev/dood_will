<?php

namespace App\Manager;

use App\Repository\TerritoriesRepository;

class TerritoryManager
{
    private TerritoriesRepository $territoriesRepository;
    const WHITE_OF_KIND_TERRITORY = [
            'commune' => 'FRCOMM',
            'epci' => 'FREPCI',
            'departement' => 'FRDEPA',
            'region' => 'FRREGI'];

    /**
     * @param TerritoriesRepository $territoriesRepository
     */
    public function __construct(TerritoriesRepository $territoriesRepository)
    {
        $this->territoriesRepository = $territoriesRepository;
    }

    /**
     * @param int $territoryId
     * @return array
     */
    public function getTerritoryChild(int $territoryId): array
    {
        $territories = $this->territoriesRepository->territoryChild($territoryId);

        return array_map(function ($i) {
            return $i->toArray();
        }, $territories);
    }

    /**
     * @param string $kind
     * @return array
     */
    public function getListByZone(string $kind): array
    {
        $territories = $this->territoriesRepository->listAllZone(self::WHITE_OF_KIND_TERRITORY[$kind]);

        return array_map(function ($i) {
            return $i->toArray();
        }, $territories);
    }

}