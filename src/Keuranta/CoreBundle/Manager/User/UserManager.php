<?php

namespace Keuranta\CoreBundle\Manager\User;

use FOS\UserBundle\Doctrine\UserManager as BaseUserManager;


class UserManager extends BaseUserManager 
{
    /**
     * {@inheritdoc}
     */
    public function findUsersBy(array $criteria = null, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->repository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return parent::findUsers($criteria, $orderBy, $limit, $offset);
    }

    /**
     * {@inheritdoc}
     */
    public function findOneBy(array $criteria, array $orderBy = null)
    {
        return parent::findUserBy($criteria);
    }

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        return parent::createUser();
    }

    /**
     * {@inheritdoc}
     */
    public function save($entity, $andFlush = true)
    {
        parent::updateUser($entity, $andFlush);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($entity, $andFlush = true)
    {
        parent::deleteUser($entity);
    }

    /**
     * {@inheritdoc}
     */
    public function getTableName()
    {
        return $this->objectManager->getClassMetadata($this->class)->table['name'];
    }

    /**
     * {@inheritdoc}
     */
    public function getConnection()
    {
        return $this->objectManager->getConnection();
    }

}
