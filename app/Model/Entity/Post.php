<?php

namespace Model\Entity;

/**
 * Post
 *
 * @Table(name="posts", uniqueConstraints={@UniqueConstraint(name="idx_posts_titles", columns={"title"})}, indexes={@Index(name="IDX_885DBAFAA76ED395", columns={"user_id"})})
 * @Entity(repositoryClass="Model\Repository\PostRepository")
 */
class Post
{
    /**
     * @var int
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="posts_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="title", type="string", length=200, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @Column(name="created_at", type="date", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var bool
     *
     * @Column(name="published", type="boolean", nullable=false)
     */
    private $published = false;

    /**
     * @var \Model\Entity\User
     *
     * @ManyToOne(targetEntity="Model\Entity\User",cascade={"persist", "remove", "merge"}, inversedBy="posts")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Posts
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content.
     *
     * @param string|null $content
     *
     * @return Posts
     */
    public function setContent($content = null)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string|null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return Posts
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set published.
     *
     * @param bool $published
     *
     * @return Posts
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published.
     *
     * @return bool
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set user.
     *
     * @param \Model\Entity\User|null $user
     *
     * @return Posts
     */
    public function setUser(\Model\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \Model\Entity\User|null
     */
    public function getUser()
    {
        return $this->user;
    }
}
