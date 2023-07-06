<?php

class PostCategory
{
    
    private ?int $id;
    private string $name;
    private string $description;
    private array $posts; //tableau de Post
    
    public function __construct(string $name, string $description)
    {
        $this->id = null;
        $this->name = $name;
        $this->description = $description;
        $this->posts = [];
    }
    
    public function getId() : int
    {
        return $this->id;
    }
    
    public function getName() : string
    {
        return $this->name;
    }
    
    public function getDescription() : string
    {
        return $this->description;
    }
    
    public function getPosts() : array
    {
        return $this->posts;
    }
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function setName(string $name) : void
    {
        $this->name = $name;
    }
    
    public function setDescription(string $description) : void
    {
        $htis->description = $description;
    }
    
    public function setPosts(array $posts) : void
    {
        $this->posts = $posts;
    }
    
    public function addPost(Post $post) : array
    {
        array_push($this->posts, $post);
        return $this->posts;
    }
    
    public function removePost(Post $post) : array
    {
        array_pop($this->posts, $post);
        return $this->posts;
    }
}

?>