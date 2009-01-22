<?php

namespace Doctrine\Tests\Models\CMS;

/**
 * @DoctrineEntity(tableName="cms_users")
 */
class CmsUser
{
    /**
     * @DoctrineId
     * @DoctrineColumn(type="integer")
     * @DoctrineIdGenerator("auto")
     */
    public $id;
    /**
     * @DoctrineColumn(type="varchar", length=50)
     */
    public $status;
    /**
     * @DoctrineColumn(type="varchar", length=255)
     */
    public $username;
    /**
     * @DoctrineColumn(type="varchar", length=255)
     */
    public $name;
    /**
     * @DoctrineOneToMany(targetEntity="Doctrine\Tests\Models\CMS\CmsPhonenumber",
            mappedBy="user", cascade={"save"})
     */
    public $phonenumbers;
    /**
     * @DoctrineOneToMany(targetEntity="Doctrine\Tests\Models\CMS\CmsArticle", mappedBy="user")
     */
    public $articles;

    /**
     * Adds a phonenumber to the user.
     *
     * @param <type> $phone
     */
    public function addPhonenumber(CmsPhonenumber $phone) {
        $this->phonenumbers[] = $phone;
        $phone->user = $this;
    }
}