<?php

namespace CB\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DirectoriesArchitecture
 *
 * @ORM\Table(name="directories_architecture", indexes={@ORM\Index(name="fk_dir_has_parent", columns={"parent_dir"})})
 * @ORM\Entity
 */
class DirectoriesArchitecture
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="dir_name", type="string", length=255, nullable=true)
     */
    private $dirName;

    /**
     * @var string
     *
     * @ORM\Column(name="real_path", type="string", length=2000, nullable=true)
     */
    private $realPath;

    /**
     * @var string
     *
     * @ORM\Column(name="virtual_path", type="string", length=2000, nullable=true)
     */
    private $virtualPath;

    /**
     * @var \DirectoriesArchitecture
     *
     * @ORM\ManyToOne(targetEntity="DirectoriesArchitecture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_dir", referencedColumnName="id")
     * })
     */
    private $parentDir;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dirName
     *
     * @param string $dirName
     * @return DirectoriesArchitecture
     */
    public function setDirName($dirName)
    {
        $this->dirName = $dirName;

        return $this;
    }

    /**
     * Get dirName
     *
     * @return string 
     */
    public function getDirName()
    {
        return $this->dirName;
    }

    /**
     * Set realPath
     *
     * @param string $realPath
     * @return DirectoriesArchitecture
     */
    public function setRealPath($realPath)
    {
        $this->realPath = $realPath;

        return $this;
    }

    /**
     * Get realPath
     *
     * @return string 
     */
    public function getRealPath()
    {
        return $this->realPath;
    }

    /**
     * Set virtualPath
     *
     * @param string $virtualPath
     * @return DirectoriesArchitecture
     */
    public function setVirtualPath($virtualPath)
    {
        $this->virtualPath = $virtualPath;

        return $this;
    }

    /**
     * Get virtualPath
     *
     * @return string 
     */
    public function getVirtualPath()
    {
        return $this->virtualPath;
    }

    /**
     * Set parentDir
     *
     * @param \CB\APIBundle\Entity\DirectoriesArchitecture $parentDir
     * @return DirectoriesArchitecture
     */
    public function setParentDir(\CB\APIBundle\Entity\DirectoriesArchitecture $parentDir = null)
    {
        $this->parentDir = $parentDir;

        return $this;
    }

    /**
     * Get parentDir
     *
     * @return \CB\APIBundle\Entity\DirectoriesArchitecture 
     */
    public function getParentDir()
    {
        return $this->parentDir;
    }
}
