<?php
namespace App\Manager;

/**
 * Interface EntityInterface
 *
 * Tout les managers/repositories d'une entité doivent implémenter cette interface
 */
interface ManagerInterface {
    /**
     * Hydrater une entité (array => entity)
     * @param array $datas
     * @return mixed
     */
    public function hydrate(array $datas);

    /**
     * Récupérer une entité à partir de son id ou de son nameSlug
     * @return mixed
     */
    public function findOne();

    /**
     * Récupérer toutes les entrées d'une entité
     * @return mixed
     */
    public function findAll();

    /**
     * Ajouter une nouvelle entité
     * @return mixed
     */
    public function add();

    /**
     * Éditer une entité à partir de son id ou de son nameSlug
     * @return mixed
     */
    public function edit();

    /**
     * Supprimer une entité à partir de son id ou de son nameSlug
     * @return mixed
     */
    public function delete(int $id);
}
