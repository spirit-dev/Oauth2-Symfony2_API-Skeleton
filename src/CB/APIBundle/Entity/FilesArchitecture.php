<?php

namespace CB\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FilesArchitecture
 *
 * @ORM\Table(name="files_architecture", indexes={@ORM\Index(name="fk_file_has_parent", columns={"parent_dir"})})
 * @ORM\Entity
 */
class FilesArchitecture
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
     * @ORM\Column(name="file_name", type="string", length=255, nullable=true)
     */
    private $fileName;

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
     * Set fileName
     *
     * @param string $fileName
     * @return FilesArchitecture
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string 
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set realPath
     *
     * @param string $realPath
     * @return FilesArchitecture
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
     * @return FilesArchitecture
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
     * @return FilesArchitecture
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
