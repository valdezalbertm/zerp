<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\AccountGroup;

class AccountGroupRepository extends EntityRepository
{
    /**
     * This function will generate the code for newly created Account Group
     * @param AccountGroup $accountGroup The selected parent account group
     * @return $code
     */
    public function getCode(AccountGroup $accountGroup = null)
    {
        $sql = "";
        if ($accountGroup) {
            $sql = "SELECT MAX(ag.code) FROM AppBundle:AccountGroup ag WHERE ag.parent = :parent";
        } else {
            $sql = "SELECT MAX(ag.code) FROM AppBundle:AccountGroup ag WHERE ag.parent IS NULL";

        }

        $qb = $this->getEntityManager()->createQuery($sql);
        if ($accountGroup) {
            $qb = $qb->setParameter('parent', $accountGroup);
        }

        $qb = $qb->getSingleScalarResult();

        $code = str_pad(intval($qb) + 1, 3, '0', STR_PAD_LEFT);

        return $code;
    }
}
