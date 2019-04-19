<?php
/**
 * Created by PhpStorm.
 * User: Yassine
 * Date: 2019-04-13
 * Time: 11:45 AM
 */

// src/MyProject/MyBundle/Entity/Thread.php
namespace Yassine\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\CommentBundle\Entity\Thread as BaseThread;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Thread extends BaseThread
{
    /**
     * @var string $id
     *
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $id;


}